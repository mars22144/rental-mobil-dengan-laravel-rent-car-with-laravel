<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class SelesaiTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $transaksiSelesai = Transaksi::SELESAI()->orderBy('id', 'desc')->paginate(5);
       //$transaksiSelesai= Transaksi::where('status', 'SELESAI')->paginate(5);
        return view('livewire.proses-transaksi', [ 'transaksi' => $transaksiSelesai]);
    }
}
