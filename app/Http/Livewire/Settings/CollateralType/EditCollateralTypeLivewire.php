<?php

namespace App\Http\Livewire\Settings\CollateralType;

use Livewire\Component;
use App\Models\LoanCollateralType;

class EditCollateralTypeLivewire extends Component
{
    /**
     * @var string
     */
    public $collateralType;

    /**
     * @var string
     */
    public $hashid = '';

    /**
     * @var string
     */
    public $collateralTypeToUpdate;

    public function mount($hashid)
    {
        $this->collateralTypeToUpdate = LoanCollateralType::where("hashid", $hashid)->firstOrFail();
        $this->collateralType = $this->collateralTypeToUpdate->type;
    }

    /**
     * Reset Filters
     *
     * @return void
     */

    public function resetFilters()
    {
        $this->reset([
            'collateralType',
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
            'collateralType' => 'required|unique:loan_collateral_types,type',
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

        $collateralType = LoanCollateralType::whereHashid($hashid)->firstOrFail();

        $collateralTypeUpdated = $collateralType->update([
            'type' => $this->collateralType,
        ]);

        if ($collateralTypeUpdated != null) {
            $this->resetFilters();
            session()->flash('success', 'Collateral Type has been Update.');
            return redirect()->route('admin.settings.collateral-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.collateral-types.create');
        }
    }

    public function render()
    {
        return view('livewire.settings.collateral-type.edit-collateral-type-livewire');
    }

    public function delete()
    {
        $hashid = $this->hashid;
        $collateralType = LoanCollateralType::whereHashid($hashid)->firstOrFail();
        $collateralType->delete();

        if ($collateralType != null) {
            $this->resetFilters();
            session()->flash('success', 'Collateral Type has been deletd.');
            return redirect()->route('admin.settings.collateral-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.collateral-types.edit',  $hashid);
        }
    }
}
