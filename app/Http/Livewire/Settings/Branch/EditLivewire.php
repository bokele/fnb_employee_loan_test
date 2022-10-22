<?php

namespace App\Http\Livewire\Settings\Branch;

use App\Models\Branch;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditLivewire extends Component
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
     * @var string
     */
    public $hashid = '';
    public $branch;

    public function mount($hashid)
    {
        $this->branch = Branch::where("hashid", $hashid)->firstOrFail();
        $this->branch_name = $this->branch->branch_name;
        $this->address  = $this->branch->address;
        $this->phone_number = $this->branch->phone_number;
    }
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
            'branch_name' => ['required', Rule::unique('branches')->ignore($this->branch->id)],
            'phone_number' => [Rule::unique('branches')->ignore($this->branch->id)],
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
        $hashid = $this->hashid;

        $branch = Branch::whereHashid($hashid)->firstOrFail();
        $branch_update = $branch->update([
            'created_by' => auth()->id(),
            'branch_name' => $this->branch_name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
        ]);

        if ($branch_update != null) {
            $this->resetFilters();
            session()->flash('success', 'Branch has been updated.');
            return redirect()->route('admin.settings.branches.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.branches.create');
        }
    }

    public function render()
    {
        return view('livewire.settings.branch.edit-livewire');
    }

    public function delete()
    {
        $hashid = $this->hashid;
        $branch = Branch::whereHashid($hashid)->firstOrFail();
        $branch->delete();

        if ($branch != null) {
            $this->resetFilters();
            session()->flash('success', 'Branch has been deletd.');
            return redirect()->route('admin.settings.branches.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.branches.index');
        }
    }
}
