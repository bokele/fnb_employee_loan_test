<?php

namespace App\Http\Livewire\Settings\CollateralType;

use Livewire\Component;
use App\Models\LoanCollateralType;

class ShowCollateralTypeLivewire extends Component
{
    public $collateralType;

    public function mount($hashid)
    {
        $this->collateralType = LoanCollateralType::where("hashid", $hashid)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.settings.collateral-type.show-collateral-type-livewire');
    }
}
