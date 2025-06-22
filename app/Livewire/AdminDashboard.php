<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\Kategori;
use App\Models\Ulasan;

class AdminDashboard extends Component
{
    use WithPagination;

    
    public $sortField = 'nama_wisata';
    public $sortDirection = 'asc';

    protected $listeners = ['delete-wisata' => 'deleteWisata'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
        $this->resetPage();
    }

    public function deleteWisata($wisata_id)
    {
        $wisata = Wisata::find($wisata_id);
        
        if ($wisata) {
            $wisata->delete();
            session()->flash('message', 'Wisata berhasil dihapus');
        }
        
        $this->resetPage();
    }

    #[layout('layouts.app')]
    public function render()
    {
        $wisata = Wisata::with(['kota', 'kategori', 'ulasan'])
            ->when($this->sortField === 'kota.nama_kota', function ($query) {
                return $query->join('kota', 'wisata.kota_id', '=', 'kota.id')
                    ->orderBy('kota.nama_kota', $this->sortDirection)
                    ->select('wisata.*');
            })
            ->when($this->sortField === 'kategori.nama_kategori', function ($query) {
                return $query->join('kategori', 'wisata.kategori_id', '=', 'kategori.id')
                    ->orderBy('kategori.nama_kategori', $this->sortDirection)
                    ->select('wisata.*');
            })
            ->when(!in_array($this->sortField, ['kota.nama_kota', 'kategori.nama_kategori']), function ($query) {
                return $query->orderBy($this->sortField, $this->sortDirection);
            })
            ->paginate(15);
            
        $jumlah_kota = Kota::count();
        $jumlah_kategori = Kategori::count();
        $jumlah_wisata = Wisata::count();
        $jumlah_ulasan = Ulasan::count();

        return view('livewire.admin-dashboard', [
            'wisata' => $wisata,
            'jumlah_kota' => $jumlah_kota,
            'jumlah_kategori' => $jumlah_kategori,
            'jumlah_wisata' => $jumlah_wisata,
            'jumlah_ulasan' => $jumlah_ulasan,
        ]);
    }
}