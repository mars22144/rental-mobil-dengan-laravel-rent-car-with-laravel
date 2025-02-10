<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;



class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage,$editPage = false;
    public $nopolisi,$merk,$jenis,$kapasitas,$harga,$id;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }
    public function create(){
        $this->reset();
        $this->addPage = true;
    }
    public function store(){
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ], [
            'nopolisi.required' => 'nomor polisi tidak boleh kosong',
            'merk.required' => 'merk tidak boleh kosong',
            'jenis.required' => 'jenis mobil tidak boleh kosong',
            'harga.required' => 'harga tidak boleh kosong',

        ]);

        Mobil::create([
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
        ]);
        session()->flash('success', 'berhasil disimpan');
        $this->reset();
    }
    public function edit($id){
        $this->editPage = true;
        $this->id = $id;
        $mobil = Mobil::find($id);
        $this->nopolisi = $mobil->nopolisi;
        $this->merk = $mobil->merk;
        $this->jenis = $mobil->jenis;
        $this->jenis = $mobil->harga;
    }
    public function update(){
        $mobil = Mobil::find($this->id);
        $mobil->update([
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
        ]);
        session()->flash('success', 'berhasil diubah');
        $this->reset();
    }
    public function destroy($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        session()->flash('success', 'berhasil dihapus');
        $this->reset();
    }

}
