<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use LiveWire\Attributes\On;
use Livewire\InteractsWithBrowser;




 class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    //coba
    public $tanggal1, $tanggal2;

    #[on('lihat-transaksi')]
    public function render()
    {

        //coba
        
        //$transaksi = Transaksi::where('status', 'WAIT')->paginate(5);
        $transaksi = Transaksi::WAIT()->orderBy('id', 'desc')->paginate(5);


        //$data['transaksi'] = Transaksi::paginate(5);
        return view('livewire.lihat-transaksi', [ 'transaksi' => $transaksi]);
    }
    //coba
    
    
    //end



    //coba



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
