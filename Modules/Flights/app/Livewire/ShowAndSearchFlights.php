<?php

namespace Modules\Flights\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Flights\Models\Flight;
use Illuminate\Support\Facades\Cache;

class ShowAndSearchFlights extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        $flights = Flight::with('user', 'submittedModel')
                    ->whereHas('user', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy('date', 'DESC')
                    ->orderBy('end_time', 'DESC')
                    ->paginate(20);

        return view('flights::livewire.show-and-search-flights', [
            'flights' => $flights,
        ]);
    }
}
