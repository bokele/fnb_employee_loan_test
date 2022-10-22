<?php

namespace App\Http\Livewire\Settings\Branch;

use App\Models\Branch;
use Livewire\Component;



class CreateLivewire extends Component
{
    /**
     * @var string
     */
    public $branch_name;
    /**
     * @var string
     */
    public $address;
    /**
     * @var string
     */
    public $phone_number;

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'branch_name',
            'address',
            'phone_number',
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
            'branch_name' => 'required|unique:branches,branch_name',
            'phone_number' => 'unique:branches,phone_number',
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

        $branch =  Branch::create([
            'created_by' => auth()->id(),
            'branch_name' => $this->branch_name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
        ]);

        if ($branch != null) {
            $this->resetFilters();
            session()->flash('success', 'Branch has been created.');
            return redirect()->route('admin.settings.branches.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.branches.create');
        }
    }

    public function render()
    {
        return view('livewire.settings.branch.create-livewire');
    }
}
