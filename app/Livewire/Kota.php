<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Kota as KotaModel;

class Kota extends Component
{
    public $nama_kota = '';

    protected $rules = [
        'nama_kota' => 'required|string|max:255|unique:kota,nama_kota',
    ];

    protected $messages = [
        'nama_kota.required' => 'Nama kota wajib diisi.',
        'nama_kota.string' => 'Nama kota harus berupa teks.',
        'nama_kota.max' => 'Nama kota maksimal 255 karakter.',
        'nama_kota.unique' => 'Nama kota sudah ada.',
    ];

    public function store()
    {
        $this->validate();

        try {
            KotaModel::create([
                'nama_kota' => $this->nama_kota,
            ]);

            session()->flash('message', 'Kota berhasil ditambah');
            
            return redirect()->route('admin');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    #[layout('layouts.app')]
    public function render()
    {
        return view('livewire.create-kota');
    }
}