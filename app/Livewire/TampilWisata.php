<?php

namespace App\Livewire;

use App\Models\Wisata;
use App\Models\Ulasan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class TampilWisata extends Component
{
    public $kota;
    public $wisata_id;
    public $kategori;
    public $ulasans;
    public $wisatas;
    public $namaPengunjung;
    public $averageRating;
    public $isiUlasan;
    public $rating = 0;
    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'isiUlasan' => 'nullable|string|max:1000',
        'namaPengunjung' => 'required_with:ulasan|string|max:255',
    ];
    protected $messages = [
        'rating.required' => 'Rating wajib diberikan.',
        'rating.min' => 'Rating minimal 1 bintang.',
        'rating.max' => 'Rating maksimal 5 bintang.',
        'ulasan.max' => 'Ulasan maksimal 1000 karakter.',
    ];

    #[layout('layouts.app')]

    public function mount($wisata_id)
    {
        $this->wisata_id = $wisata_id;
        $this->namaPengunjung = Auth::user()->name;
        $this->loadWisataData();
    }
    public function loadWisataData()
    {
        $this->wisatas = Wisata::with(['ulasan', 'kategori', 'kota'])
        ->findOrFail($this->wisata_id);
        $this->ulasans = Ulasan::with(['user'])
        ->where('wisata_id', $this->wisata_id)
        ->orderBy('created_at', 'desc')
        ->get();
    
        if ($this->ulasans->count() > 0) {
            $this->averageRating = $this->ulasans->avg('rating');
        } else {
            $this->averageRating = 0;
        }
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function submitUlasan()
    {
        $this->validate();
        
        if ($this->isiUlasan) {
            Ulasan::create([
                'wisata_id' => $this->wisata_id,
                'user_id' => Auth::id(),
                'rating' => $this->rating,
                'komentar' => $this->isiUlasan
            ]);
            
            $this->reset(['rating', 'isiUlasan']);
        } else {
            Ulasan::create([
                'wisata_id' => $this->wisata_id,
                'user_id' => Auth::id(),
                'rating' => $this->rating
            ]);
            
            $this->reset(['rating']);
        }
        
        $this->loadWisataData();

        session()->flash('message', 'Ulasan berhasil ditambahkan!');
    }
    public function render()
    {
        return view('livewire.tampil-wisata');
    }
}
