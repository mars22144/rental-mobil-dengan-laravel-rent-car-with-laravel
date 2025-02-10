<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class TransaksiUndo extends Component
{
    public $transaksi;

    public function mount($transaksiId)
    {
        $this->transaksi = Transaksi::findOrFail($transaksiId);
    }

    public function undo()
    {
        if ($this->transaksi->status === 'proses') {
            $this->transaksi->status = 'wait';
        } elseif ($this->transaksi->status === 'selesai') {
            $this->transaksi->status = 'proses';
        }

        $this->transaksi->save();

        // Optional: Emit event or flash message for feedback
        $this->emit('transaksiUpdated');
    }

    public function render()
    {
        return view('livewire.transaksi-undo');
    }
}
