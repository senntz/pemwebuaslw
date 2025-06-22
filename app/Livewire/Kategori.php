<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Kategori as KategoriModel;

class Kategori extends Component
{
    public $nama_kategori = '';

    protected $rules = [
        'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
    ];

    protected $messages = [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
        'nama_kategori.string' => 'Nama kategori harus berupa teks.',
        'nama_kategori.max' => 'Nama kategori maksimal 255 karakter.',
        'nama_kategori.unique' => 'Nama kategori sudah ada.',
    ];

    public function store()
    {
        $this->validate();

        try {
            KategoriModel::create([
                'nama_kategori' => $this->nama_kategori,
            ]);

            session()->flash('message', 'Kategori berhasil ditambah');
            
            return redirect()->route('admin');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    #[layout('layouts.app')]
    public function render()
    {
        return view('livewire.create-kategori');
    }
}