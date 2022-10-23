<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(Request $request)
    {


        $this->middleware(function ($request, $next) {
            if (!auth()->user()->hasRole('admin')) {
                abort(403);
            }

            return $next($request);
        });
    }

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



    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $data = [
            'title' => "User Edit",
            "hashid" => $user->hashid
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
