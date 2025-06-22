<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wisata as WisataModel;
use App\Models\Kota;
use Livewire\Attributes\Layout;
use App\Models\Kategori;

class Wisata extends Component
{
    public $nama = '';
    public $deskripsi = '';
    public $kota_id = '';
    public $kategori_id = '';
    public $biaya_masuk = '';

    protected $rules = [
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kota_id' => 'required|exists:kota,id',
        'kategori_id' => 'required|exists:kategori,id',
        'biaya_masuk' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'nama.required' => 'Nama wisata wajib diisi.',
        'nama.string' => 'Nama wisata harus berupa teks.',
        'nama.max' => 'Nama wisata maksimal 255 karakter.',
        'deskripsi.required' => 'Deskripsi wisata wajib diisi.',
        'deskripsi.string' => 'Deskripsi wisata harus berupa teks.',
        'kota_id.required' => 'Kota wajib dipilih.',
        'kota_id.exists' => 'Kota yang dipilih tidak valid.',
        'kategori_id.required' => 'Kategori wajib dipilih.',
        'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
        'biaya_masuk.required' => 'Biaya masuk wajib diisi.',
        'biaya_masuk.numeric' => 'Biaya masuk harus berupa angka.',
        'biaya_masuk.min' => 'Biaya masuk tidak boleh kurang dari 0.',
    ];

    public function store()
    {
        $this->validate();

        WisataModel::create([
            'nama_wisata' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'kota_id' => $this->kota_id,
            'kategori_id' => $this->kategori_id,
            'biaya_masuk' => $this->biaya_masuk,
        ]);

        session()->flash('message', 'Wisata berhasil ditambah');
        
        return redirect()->route('admin');
    }

    public function delete($wisata_id)
    {
        $wisata = WisataModel::find($wisata_id);
        
        if ($wisata) {
            $wisata->delete();
            session()->flash('message', 'Wisata berhasil dihapus');
        } else {
            session()->flash('error', 'Wisata tidak ditemukan.');
        }
        
        return redirect()->route('admin');
    }

    #[layout('layouts.app')]
    public function render()
    {
        $kota_list = Kota::all();
        $kategori_list = Kategori::all();

        return view('livewire.create-wisata', [
            'kota_list' => $kota_list,
            'kategori_list' => $kategori_list,
        ]);
    }
}