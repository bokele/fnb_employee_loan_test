<?php

namespace App\Http\Livewire\UserManagement\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Branch;
use Illuminate\Validation\Rule;

class EditUserLivewire extends Component
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
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $phone_number;
    /**
     * @var string
     */
    public $gender;
    /**
     * @var string
     */
    public $genderList;
    public $jobTypeList;
    public $jobType;
    public $baseSalary;
    public $branchList;
    public $branch;
    public $show_salary_base = false;
    /**
     * @var array
     */
    public $roles = [];

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'name',
            'email',
            'gender',
            'phone_number',
            'roles',
            'jobType',
            'branch',
            'baseSalary',
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
            'email' => ['required', 'string',  Rule::unique('users', 'email')->ignore($this->user->id)],
            'phone_number' => ['required', 'string',  Rule::unique('users', 'phone')->ignore($this->user->id)],
            'gender' => ['required', 'string'],
            'branch' => ['required',],
            'jobType' => ['required', 'string'],
            'baseSalary' => "required_if:jobType,'full time'",
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

        $this->hashid = $hashid;
        $this->roleList = $this->getRoles();
        $this->genderList = $this->getGender();
        $this->jobTypeList = $this->getJobType();
        $this->branchList = $this->getBranches();

        $this->user = User::with('roles')->whereHashid($hashid)->firstOrFail();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->gender = $this->user->gender;
        $this->phone_number = $this->user->phone;
        $this->jobType = $this->user->job_type;
        $this->baseSalary = $this->user->base_salary;
        $this->branch = $this->user->branch_id;
        if ($this->jobType == 'full time') {

            $this->show_salary_base = true;
        }
        // dd($this->user->roles);

        $setOfIds = $this->user->roles->pluck('id')->toArray();
        $this->roles = array_fill_keys($setOfIds, true);
    }

    public function render()
    {
        return view('livewire.user-management.user.edit-user-livewire');
    }

    protected function getRoles()
    {
        $roles = Role::pluck('name', 'id');
        return $roles;
    }
    protected function getBranches()
    {
        return Branch::pluck('branch_name', 'id');
    }
    protected function getGender()
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
        ];
    }
    protected function getJobType()
    {
        return [
            'full time' => 'Full Time',
            'remote' => 'Remote',
            'contract' => 'Contract',
            'Part time' => 'Part Time',
            'internship' => 'Internship',
            'temporary' => 'Temporary',

        ];
    }


    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // dd($this->roles);

        $this->validate();
        $hashid = $this->hashid;
        $user = User::whereHashid($hashid)->firstOrFail();
        $userUpdate = $user->update([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone_number,
            "gender" => $this->gender,
            "gender" => $this->gender,
            "job_type" => $this->jobType,
            'branch_id' => $this->branch,
        ]);


        $user->assignRole($this->roles);

        $user->syncPermissions(['edit articles', 'delete articles']);

        if ($userUpdate != null) {
            $this->resetFilters();
            session()->flash('success', 'User has been created.');
            return redirect()->route('admin.user-management.users.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.user-management.users.create');
        }
    }

    public function changeJobType()
    {
        if (in_array($this->jobType, ['full time'])) {
            $this->show_salary_base = true;
        } else {
            $this->show_salary_base = false;
        }
    }
}
