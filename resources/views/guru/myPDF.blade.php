<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
</head>
<body>

    <table align="center" cellpadding="0" cellspacing="0">
        <tr>
            {{-- <td rowspan="4"><img src="assets/img/logosma.png" alt="" width="150px"></td> --}}
            <td>PEMERINTAH PROVINSI JAWA TENGAH</td>
        </tr>
        <tr>
            <td>DINAS PENDIDIKAN</td>
        </tr>
        <tr>
            <td><h1>{{ $title }}</h1></td>
        </tr>
        <tr>
            <td>KABUPATEN NGANJUK</td>
        </tr>
    </table>
    <p>Data Guru SMAN 1 Jakenan | {{ $date }}</p>
    <table class="table" border="1" align="center" cellpadding="1" cellspacing="0">
        <thead>
            <tr>
                <th class="font-weight-bold">No</th>
                <th class="font-weight-bold">NIP</th>
                <th class="font-weight-bold">Nama</th>
                <th class="font-weight-bold">Alamat</th>
                <th class="font-weight-bold">Tanggal Lahir</th>
                <th class="font-weight-bold">Gender</th>
                <th class="font-weight-bold">Tempat Lahir</th>
                <th class="font-weight-bold">No Telp</th>
                <th class="font-weight-bold">Agama</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $no = 1; 
            @endphp
            @foreach ($ar_guru as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$row->nip}}</td>
                <td>{{$row->nama }}</td>
                <td>{{$row->alamat }}</td>
                <td>{{$row->tgl_lahir }}</td>
                <td>{{$row->gender }}</td>
                <td>{{$row->tempat_lahir }}</td>
                <td>{{$row->no_telp}}</td>
                <td>{{$row->agama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>