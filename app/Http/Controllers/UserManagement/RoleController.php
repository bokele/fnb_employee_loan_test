<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(): View
    {

        $data = [
            'title' => "Roles"
        ];

        return view("user-management.roles.index")->with($data);
    }

    public function create(): View
    {

        $data = [
            'title' => "Role Create"
        ];


        return view("user-management.roles.create")->with($data);
    }



    public function edit(Role $role): View
    {
        $data = [
            'title' => "Role Edit",
            "hashid" => $role->id
        ];
        return view('user-management.roles.edit')->with($data);
    }
}
