<?php

namespace App\Repositories;

interface UserInterface
{
    public function signin();

    public function log($request, $user);

    public function store($request, $user);

    public function addUser($request, $user);

    public function index();

    public function getAll();

    public function edit($id);

    public function update($request, $user, $id);

    public function destroy($user, $id, $request);

    public function emailVerification($request);

    public function otpVerification($request);

    public function updatePassword($request);

    public function logout($request, $user);
}