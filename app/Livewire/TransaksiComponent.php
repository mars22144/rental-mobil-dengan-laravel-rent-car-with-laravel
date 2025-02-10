<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class TransaksiComponent extends Component
{
    
    use WithPagination,WithoutUrlPagination;
    protected $paginationTheme = "bootstrap";
    public $addPage, $lihatPage = false;
    public $nama, $ponsel, $alamat, $lama, $tanggal, $mobil_id, $harga, $total;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.transaksi-component', $data);
    }
    public function create($id, $harga){
        $this->mobil_id  = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }
    public function hitung(){
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $lama * $harga;
    }
    public function store(){
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tanggal' => 'required',
        ], [
            'nama.required' => 'nama tidak boleh kosong',
            'ponsel.required'=> 'nomor ponsel tidak boleh kosong',
            'alamat'=> 'alamat tidak boleh kosong',
            'lama.required' => 'lama pemesanan tidak boleh kosng',
            'tanggal' => 'tanggal pemesanan tidak boleh kosong',
        ]);
        $cari = Transaksi::where('mobil_id', $this->mobil_id)
        ->where('tgl_pesan', $this->tanggal)
        ->where('status', '!=', 'SELESAI')->count();
        if($cari == 1){
            session()->flash('error', 'mobil sudah dipesan');
        }else{
            Transaksi::create([
            'user_id' => auth()->user()->id,
            'mobil_id' => $this->mobil_id,
            'nama' => $this->nama,
            'ponsel' => $this->ponsel,
            'lama' => $this->lama,
            'alamat' => $this->alamat,
            'tgl_pesan' => $this->tanggal,
            'total' => $this->total,
            'status' => 'WAIT'
        ]);
        session()->flash('success', 'transaksi berhasil disimpan');
        }
        $this->dispatch('lihat-transaksi');
        $this->reset();
    }
    public function lihat(){
        $data['transaksi'] = Transaksi::paginate(10);
        return view('transaksi');
        $this->lihatPage = true;
    }
}