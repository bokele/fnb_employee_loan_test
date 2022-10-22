<?php

namespace App\Http\Livewire\UserManagement\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRoleLivewire extends Component
{
    /**
     *
     * @var Spatie\Permission\Models\Role
     */
    public $permissionList;

    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $permissions = [];

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'name',
            'permissions'
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
            'name' => ['required', 'string'],
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

        $this->permissionList = $this->getPermissions();
    }

    public function render()
    {
        return view('livewire.user-management.role.create-role-livewire');
    }

    protected function getPermissions()
    {
        return  Permission::pluck('name', 'id');
    }


    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->validate();

        $role = Role::create(['name' => $this->name]);


        $role->givePermissionTo($this->permissions);

        if ($role != null) {
            $this->resetFilters();
            session()->flash('success', 'Role has been created.');
            return redirect()->route('admin.user-management.roles.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.roles.create');
        }
    }
}
