<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h2>laporan transaksi</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Polisi</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Lama</th>
                <th scope="col">Tgl Pesan</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->mobil->nopolisi }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->lama }}</td>
                <td>{{ $data->tgl_pesan }}</td>
                <td>{{ $data->total }}</td>
               
            </tr>
            @empty
                <tr>
                    <td colspan="6">Data laporan belum ada</td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
</body>
</html>