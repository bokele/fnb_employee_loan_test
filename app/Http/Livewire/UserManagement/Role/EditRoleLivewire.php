<?php

namespace App\Http\Livewire\UserManagement\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class EditRoleLivewire extends Component
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

    public $hashid;
    public $role;

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
            'name' => ['required', 'string', Rule::unique('roles', 'name')->ignore($this->role->id)],
            // 'roles' => ['array'],
        ];
    }

    /**
     * Component Mound
     *
     * @return void;
     */

    public function mount($hashid)
    {
        $this->role = Role::with("permissions")->where("id", $hashid)->firstOrFail();
        $this->permissionList = $this->getPermissions();

        $this->name = $this->role->name;
        $setOfIds = $this->role->permissions->pluck('id')->toArray();
        $this->permissions = array_fill_keys($setOfIds, true);
    }


    public function render()
    {
        return view('livewire.user-management.role.edit-role-livewire');
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

        $hashid = $this->hashid;

        $role = Role::whereId($hashid)->firstOrFail();

        $role->update(['name' => $this->name]);

        $role->syncPermissions($this->permissions);

        if ($role != null) {
            $this->resetFilters();
            session()->flash('success', 'Role has been Updated.');
            return redirect()->route('admin.user-management.roles.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.roles.create');
        }
    }

    public function delete()
    {
        $hashid = $this->hashid;
        $role = Role::whereId($hashid)->firstOrFail();
        $role->delete();

        if ($role != null) {
            $this->resetFilters();
            session()->flash('success', 'Role has been deletd.');
            return redirect()->route('admin.user-management.roles.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.roles.edit',  $hashid);
        }
    }
}
