<?php

namespace App\Livewire;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use LiveWire\Attributes\On;

use Livewire\Component;

class TransaksiSelesai extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    public $tanggal1, $tanggal2;

    #[on('lihat-transaksi')]
    public function render()
    {
        //coba
        if($this->tanggal2 != ""){
            $data['transaksi'] = Transaksi::where('status', 'SELESAI')
            ->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])
            ->paginate(20);
        }else{
            $data['transaksi'] = Transaksi::paginate(20);
        }


        //$data['transaksi'] = Transaksi::paginate(5);
        return view('livewire.transaksi-selesai', $data);
    }
    
    //coba
    
    public function cari(){
        $this->dispatch('lihat-transaksi');
    }
    //end

    
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
