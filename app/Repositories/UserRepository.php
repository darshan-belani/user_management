<?php

namespace App\Repositories;

use App\Events\OtpMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserRepository implements UserInterface
{

    /**
     * @param $request
     * @param $management
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($request, $management)
    {
        $rules = array(
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'uname' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'role' => 'required',
            'status' => 'required',
        );
        $params = $request->all();
        $validator = Validator::make($params, $rules);

        if ($validator->fails()) {
            return redirect('signup')->withErrors($validator)->withInput();
        } else {
            $management->firstName = $request->fname;
            $management->lastName = $request->lname;
            $management->email = $request->email;
            $management->userName = $request->uname;
            $management->password = Hash::make($request->password);
            $management->contact_no = $request->mobile;
            $management->address = $request->address;
            $management->role = $request->role;
            $management->status = $request->status;
            $management->save();
            Session::flash('message', "Registration Successfully");
            return redirect('signin');
        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function signin()
    {
        return view("signin");
    }

    /**
     * @param $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function log($request, $user)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials)) {
                $user = \auth()->user();
                Session::flash('message', "Login Successfully");
                return redirect('allUser');
            } else {
                Session::flash('message', "Please Enter Valid Email id or Password");
                return redirect('signin');
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('alluser');
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAll()
    {
        $selectData = User::orderBy('created_at', 'desc')->get();
        $data = Datatables::of($selectData)
            ->editColumn('role', function ($row) {
                foreach (config('config-variables.user_role') as $key => $value) {
                    if ($row->role == $key) {
                        return $value;
                    }
                }
            })
            ->addColumn('action', function ($selectData) {
                return '<a href="/edit/' . $selectData->id . '" class="btn btn-sm btn-primary">
                <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="delete/' . $selectData->id . '" class="btn btn-sm btn-danger">
                <i class="glyphicon glyphicon-remove"></i> delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
        return $data;
    }

    /**
     * @param $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout($request, $user)
    {
        Session::flash('message', 'Logout Successfully');
        return redirect('signin');
    }

    public function addUser($request, $user)
    {
        $user->firstName = $request->fname;
        $user->lastName = $request->lname;
        $user->email = $request->email;
        $user->userName = $request->uname;
        $user->password = Hash::make($request->password);
        $user->contact_no = $request->mobile;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        Session::flash('message', "User Add Successfully");
        return redirect('allUser');
    }

    public function edit($id)
    {
        $editData = User::find($id);
        return view('edit', compact('editData'));
    }

    /**
     * @param $request
     * @param $user
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($request, $user, $id)
    {
        $updateData = $user::find($id);
        if (\auth()->user()->role == 'Admin') {
            $updateData->firstName = $request->fname;
            $updateData->lastName = $request->lname;
            $updateData->email = $request->email;
            $updateData->userName = $request->uname;
            $updateData->contact_no = $request->mobile;
            $updateData->address = $request->address;
            $updateData->role = $request->role;
            $updateData->status = $request->status;
        } else {
            $updateData->firstName = $request->fname;
            $updateData->lastName = $request->lname;
            $updateData->email = $request->email;
            $updateData->userName = $request->uname;
            $updateData->contact_no = $request->mobile;
            $updateData->address = $request->address;
        }
        $updateData->save();
        Session::flash('message', 'Update Successfully!');
        return redirect('allUser');
    }

    /**
     * @param $user
     * @param $id
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($user, $id, $request)
    {
        $deleteData = $user::find($id);
        $deleteData->delete();
        Session::flash('message', 'Delete Successfully');
        return redirect('allUser');
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function emailVerification($request)
    {
        $email =$request->email;
        $getUserData = User::where('email', $email)->first();
        if ($getUserData) {
            $reset_otp = mt_rand(1001, 9999);
            $updateOtp = User::where('id', $getUserData->id)->first();
            $updateOtp->otp = $reset_otp;
            $updateOtp->save();
            Mail::to($getUserData->email)->send(new OtpMail($reset_otp));
            return redirect('otp');
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function otpVerification($request)
    {
        $getUserData = User::where('otp', $request->otp)->first();
        $userId = $getUserData->id;
        if ($getUserData) {
            $getUserData->otp = $request->otp;
            return view('addNewPassword', compact('userId'));
        } else {
            return "invalid OTP, Please Enter Valid OTP";
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword($request)
    {
        $getUserData = User::where('id', $request->userId)->first();
        $getUserData->password = Hash::make($request->password);
        $getUserData->save();
        return redirect('signin');
    }
}
