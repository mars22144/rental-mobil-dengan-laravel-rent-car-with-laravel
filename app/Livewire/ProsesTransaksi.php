<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ProsesTransaksi extends Component
{
   
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {   
        $transaksiProses = Transaksi::PROSES()->orderBy('id', 'desc')->paginate(5);
        //$transaksiProses= Transaksi::where('status', 'PROSES')->paginate(5);
        return view('livewire.proses-transaksi', [ 'transaksi' => $transaksiProses]);
    }
    public function cari(){
        $this->dispatch('lihat-transaksi');
    }

    public function proses($id){
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'PROSES'
        ]);
        session()->flash('success', 'berhasil diproses');
    }
    public function selesai($id){
        $transaksi = Transaksi::find($id);
        $transaksi ->update([
            'status' => 'SELESAI'
        ]);
        session()->flash('success', 'berhasil diproses');
    }
}
