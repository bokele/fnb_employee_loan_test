<?php

namespace App\Http\Livewire\Settings\CollateralType;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LoanCollateralType;

class IndexCollateralTypeLivewire extends Component
{
    use WithPagination;
    public function render()
    {
        $collateralTypes = LoanCollateralType::query()->with("createdBy")->latest()->paginate(25);
        return view('livewire.settings.collateral-type.index-collateral-type-livewire', compact('collateralTypes'));
    }
}
