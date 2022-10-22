<?php

namespace App\Http\Livewire\UserManagement\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class IndexPermissionLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $permissions  = Permission::query()->latest()->paginate(25);
        return view('livewire.user-management.permission.index-permission-livewire', compact('permissions'));
    }
}
