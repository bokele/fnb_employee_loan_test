<?php

namespace App\Http\Livewire\Settings\Branch;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class IndexLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $branches = Branch::query()->latest()->paginate(25);
        return view('livewire.settings.branch.index-livewire', compact('branches'));
    }
}
