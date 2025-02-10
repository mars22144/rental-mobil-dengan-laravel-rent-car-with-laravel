<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <h6 class="mb-4">Data Transaksi</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Polisi</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Ponsel</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Lama</th>
                            <th scope="col">Status</th>
                            <th>
                                Proses
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->mobil->nopolisi }}</td>
                            <td>{{ $data->mobil->merk }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->ponsel }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->tgl_pesan }}</td>
                            <td>@rupiah($data->total)</td>
                            <td>{{ $data->lama }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                    
                                
                                @if ($data->status == "PROSES")
                                    <button class="btn btn-sm btn-success" onclick="proses({{ $data->id }})" >SELESAI</i></button> 
                                @endif
                                
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data mobil belum ada</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $transaksi->links() }}

            </div>
        </div>
    </div>
    <script>
        function proses(id) {
            if (confirm('Apakah Anda yakin ingin memproses transaksi ini?')) {
                @this.call('selesai', id);  // Panggil fungsi Livewire jika user mengkonfirmasi
            } else {
                // Jika user membatalkan, tidak ada aksi yang diambil
                alert('Proses transaksi dibatalkan.');
            }
        }
    </script>
    
    <!-- Menampilkan pesan sukses setelah transaksi -->
    @if (session()->has('transaksiSukses'))
        <div class="alert alert-success">
            {{ session('transaksiSukses') }}
        </div>
    @endif
</div>

