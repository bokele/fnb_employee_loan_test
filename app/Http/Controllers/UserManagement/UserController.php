<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index(): View
    {

        $data = [
            'title' => "Users"
        ];

        return view("user-management.users.index")->with($data);
    }

    public function create(): View
    {

        $data = [
            'title' => "User Create"
        ];


        return view("user-management.users.create")->with($data);
    }



    public function edit($hashid): View
    {
        $data = [
            'title' => "User Edit",
            "hashid" => $hashid
        ];
        return view('user-management.users.edit')->with($data);
    }

    public function show($hashid): View
    {
        $data = [
            'title' => "Detail User",
            "hashid" => $hashid
        ];
        return view('user-management.users.show')->with($data);
    }
}
