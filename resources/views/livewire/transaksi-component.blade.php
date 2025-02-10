<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <h6 class="mb-4">Data Mobil</h6>
                <div class="row">
                    @foreach ($mobil as $data)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header" style="text-align: center">
                          {{ $data->merk }}
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">no polisi: {{ $data->nopolisi }}</li>
                          <li class="list-group-item">Harga: {{ $data->harga }}</li>
                          <li class="list-group-item">Kapasitas: {{ $data->kapasitas }}</li>
                        </ul>
                        <div class="card-body">
                            <button wire:click="create({{ $data->id }}, {{ $data->harga }})"  class="btn btn-outline-success card-link">Pesan</button>
                        </div>
                      </div>
                </div>
                @endforeach
                </div>
                {{ $mobil->links() }}
        </div>
    </div>
    @if ($addPage)
        @include('transaksi.create')
    @endif
</div>
</div>

