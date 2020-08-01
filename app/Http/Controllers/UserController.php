<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    /**
     * @var
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function signIn()
    {
        return $this->userRepository->signin();
    }
    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function log(Request $request, User $user)
    {
        return $this->userRepository->log($request, $user);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, User $user)
    {
        return $this->userRepository->store($request, $user);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addUser(Request $request, User $user)
    {
        return $this->userRepository->adduser($request, $user);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return $this->userRepository->edit($id);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user, $id)
    {
        return $this->userRepository->update($request, $user, $id);
    }

    /**
     * @param User $user
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user, $id, Request $request)
    {
        return $this->userRepository->destroy($user, $id, $request);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request, User $user)
    {
        return $this->userRepository->logout($request, $user);
    }


    public function emailVerification(Request $request)
    {
        return $this->userRepository->emailVerification($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function otpVerification(Request $request)
    {
        return $this->userRepository->otpVerification($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(Request $request)
    {
        return $this->userRepository->updatePassword($request);
    }


}