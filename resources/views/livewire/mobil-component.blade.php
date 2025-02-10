<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <h6 class="mb-4">Data Mobil</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Polisi</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Harga</th>
                            <th>
                                Proses
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mobil as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nopolisi }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->jenis }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>
                                <button class="btn btn-info" wire:click="edit({{ $data->id }})">Edit</button>
                                <button class="btn btn-danger" wire:click="destroy({{ $data->id }})">Hapus</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data mobil belum ada</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $mobil->links() }}
                
                <button wire:click="create" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
    @if ($addPage)
        @include('mobil.create')
    @endif
    @if ($editPage)
        @include('mobil.edit')
    @endif
</div>

