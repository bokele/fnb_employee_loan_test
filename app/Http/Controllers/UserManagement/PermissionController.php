<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(): View
    {

        $data = [
            'title' => "Permissions"
        ];

        return view("user-management.permissions.index")->with($data);
    }

    public function create(): View
    {

        $data = [
            'title' => "Permission Create"
        ];


        return view("user-management.permissions.create")->with($data);

        // return view('PermissionsUI::permissions.create', compact('roles'));
    }



    public function edit(Permission $permission): View
    {
        $data = [
            'title' => "Permission Edit",
            "hashid" => $permission->id
        ];
        return view('user-management.permissions.edit')->with($data);
    }
}
