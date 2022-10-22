<?php

namespace App\Http\Livewire\UserManagement\User;

use App\Models\User;
use Livewire\Component;

class IndexUserLivewire extends Component
{
    public function render()
    {
        $users = User::query()->with(['roles', 'branch'])->latest()->paginate(25);
        return view('livewire.user-management.user.index-user-livewire', compact('users'));
    }
}
