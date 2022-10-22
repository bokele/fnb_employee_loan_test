<?php

namespace App\Http\Livewire\UserManagement\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class IndexRoleLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $roles  = Role::query()->with('permissions')->latest()->paginate(25);

        return view('livewire.user-management.role.index-role-livewire', compact('roles'));
    }
}
