<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $kotas;
    public $kategoris;
    public $filterkota = null;
    public $filterbiaya = null;

    #[layout('layouts.app')]
    public function render()
    {
        $this->kotas = Kota::all();

        $query = Wisata::with(['kota', 'kategori', 'ulasan'])
            ->leftJoin('ulasan', 'wisata.id', '=', 'ulasan.wisata_id')
            ->select('wisata.*', DB::raw('AVG(ulasan.rating) as avg_rating'), DB::raw('COUNT(ulasan.id) as total_ulasan'))
            ->groupBy('wisata.id');

        if ($this->filterkota) {
            $query->where('wisata.kota_id', $this->filterkota);
        }

        if ($this->filterbiaya) {
            $query->where('wisata.biaya_masuk', '<=', $this->filterbiaya);
        }

        $wisatas = $query->orderBy('avg_rating', 'desc')->paginate(10);

        return view('livewire.dashboard', compact('wisatas'));
    }

    public function filter()
    {
        $this->resetPage();
    }
}
