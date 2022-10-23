<?php

namespace App\Http\Livewire\UserManagement\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class EditPermissionLivewire extends Component
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

    public $hashid;


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
            'name' => ['required', 'string', Rule::unique('permissions', 'name')->ignore($this->permission->id)],
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
        $this->permission = Permission::with("roles")->where("id", $hashid)->firstOrFail();
        $this->roleList = $this->getRoles();
        $this->name = $this->permission->name;

        $setOfIds = $this->permission->roles->pluck('id')->toArray();
        $this->roles = array_fill_keys($setOfIds, true);
    }

    protected function getRoles()
    {
        return Role::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.user-management.permission.edit-permission-livewire');
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

        $permission = Permission::whereId($hashid)->firstOrFail();
        $permissionupdate = $permission->update([
            "name" => $this->name
        ]);


        if ($permissionupdate != null) {
            $this->resetFilters();
            session()->flash('success', 'Permission has been created.');
            return redirect()->route('admin.user-management.permissions.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.permissions.create');
        }
    }

    public function delete()
    {
        $hashid = $this->hashid;
        $permission = Permission::whereId($hashid)->firstOrFail();
        $permission->delete();

        if ($permission != null) {
            $this->resetFilters();
            session()->flash('success', 'Permission has been deletd.');
            return redirect()->route('admin.user-management.permissions.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.permissions.edit',  $hashid);
        }
    }
}
