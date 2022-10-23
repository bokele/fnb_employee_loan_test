<?php

namespace App\Http\Livewire\UserManagement\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePermissionLivewire extends Component
{
    /**
     *
     * @var Spatie\Permission\Models\Role
     */
    public $roleList;

    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $roles;

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'name',
            'roles'
        ]);
    }


    /**
     * Valdiation rules
     *
     * @return array
     */

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:permissions,name'],
            // 'roles' => ['array'],
        ];
    }

    /**
     * Component Mound
     *
     * @return void;
     */

    public function mount()
    {

        $this->roleList = $this->getRoles();
    }

    public function render()
    {
        return view('livewire.user-management.permission.create-permission-livewire');
    }

    protected function getRoles()
    {
        return Role::pluck('name', 'id');
    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        // dd($this->name);
        $permission = Permission::create([
            "name" => $this->name
        ]);

        if ($permission != null) {
            $this->resetFilters();
            session()->flash('success', 'Permission has been created.');
            return redirect()->route('admin.user-management.permissions.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.permissions.create');
        }
    }
}
