<?php

namespace App\Http\Livewire\UserManagement\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Branch;

class CreateUserLivewire extends Component
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
            'email' => ['required', 'string', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'unique:users,phone'],
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

    public function mount()
    {

        $this->roleList = $this->getRoles();
        $this->genderList = $this->getGender();
        $this->jobTypeList = $this->getJobType();
        $this->branchList = $this->getBranches();
    }

    public function render()
    {
        return view('livewire.user-management.user.create-user-livewire');
    }

    protected function getRoles()
    {
        return Role::pluck('name', 'id');
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
        $this->validate();

        $password =  Str::random(8);
        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone_number,
            "gender" => $this->gender,
            "gender" => $this->gender,
            "job_type" => $this->jobType,
            'password' => bcrypt($password),
            'branch_id' => $this->branch,
        ]);

        $userUpdate = User::whereId($user->id)->firstOrFail();


        // $userUpdate->assignRole($this->roles);

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
