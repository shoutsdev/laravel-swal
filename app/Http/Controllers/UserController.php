<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [
            'users' => User::latest()->get()
        ];

        return view('users', $data);
    }
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        User::destroy($id);
        return back();
    }
}
