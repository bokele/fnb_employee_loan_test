<?php

namespace App\Http\Livewire\Settings\CollateralType;

use App\Models\LoanCollateralType;
use Livewire\Component;

class CreateCollateralTypeLivewire extends Component
{
    /**
     * @var string
     */
    public $collateralType;

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

        $collateralType =  LoanCollateralType::create([
            'type' => $this->collateralType,
        ]);

        if ($collateralType != null) {
            $this->resetFilters();
            session()->flash('success', 'Collateral Type has been created.');
            return redirect()->route('admin.settings.collateral-types.index');
        } else {
            session()->flash('danger', 'Something went wrong. Please try again or contact support.');
            return redirect()->route('admin.settings.collateral-types.create');
        }
    }

    public function render()
    {
        return view('livewire.settings.collateral-type.create-collateral-type-livewire');
    }
}
