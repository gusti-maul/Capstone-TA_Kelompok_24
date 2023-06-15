<!DOCTYPE html>
<html>

<head>
    <style>
        .headerr {
            margin-bottom: 20px;
        }

        .headerr p {
            margin: 0;
        }

        .header {
            text-align: center;
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .tablee {
            border-collapse: collapse;
            width: 100%;
        }

        .tablee th,
        .tablee td {
            text-align: center;
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
        }

        .tablee th {
            background-color: lightgray;
        }

        .footer {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 12px;
            text-align: right;
            width: 100%;
        }
    </style>

</head>

<body>
    <div class="headerr">
        <h3>
            <p class="header">Transkrip Nilai</p>
            @if ($siswa->kelas->tapel)
            <p class="header"> Semester {{ $siswa->kelas->tapel->semester }} TA {{ $siswa->kelas->tapel->tapel }}</p>
            @else
            <p class="header">Tahun Ajaran Tidak Tersedia</p>
            @endif
            <br>
            <br>
        </h3>

        <table style="border-collapse: collapse; width: 70%;">
            <tr>
                <td style="padding: 5px; width: 20%; text-align: left;">Nama</td>
                <td style="padding: 5px; width: 1%; text-align: left;">:</td>
                <td style=" text-align: left; width: 79%;">{{ $siswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: left;">Kelas</td>
                <td style="padding: 5px; text-align: left;">:</td>
                @if ($siswa->kelas)
                <td style=" text-align: left;">{{ $siswa->kelas->kelas }} {{ $siswa->kelas->nama_kelas }}</td>
                @else
                <p class="header">Kelas belum ada</p>
                @endif
            </tr>
        </table>
        <br>
    </div>
    <table class="tablee">
        <thead>
            <tr>
                <th class="small">No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Mata Pelajaran</th>
                <th>Nilai Pengetahuan</th>
                <th>Grade Nilai Pengetahuan</th>
                <th>Nilai Keterampilan</th>
                <th>Grade Nilai Keterampilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa->mapel as $index => $mapel)
            <tr>
                <td class="text-center">{{ $index+1 }}</td>
                @if ($mapel->tapel)
                <td class="text-center">{{ $mapel->kode_mapel }} | {{$mapel->tapel->tapel}} {{$mapel->tapel->semester}}</td>
                @else
                <td class="text-center">{{ $mapel->kode_mapel }} | - </td>
                @endif
                <td class="text-center">{{ $mapel->mapel }}</td>
                <td class="text-center">{{ $mapel->pivot->nilai_pengetahuan }}</td>
                <td class="text-center">
                    @if ($mapel->pivot->nilai_pengetahuan >= 80)
                    A
                    @elseif ($mapel->pivot->nilai_pengetahuan >= 70)
                    B
                    @elseif ($mapel->pivot->nilai_pengetahuan >= 60)
                    C
                    @elseif ($mapel->pivot->nilai_pengetahuan >= 50)
                    D
                    @else
                    E
                    @endif
                </td>
                <td class="text-center">{{ $mapel->pivot->nilai_keterampilan }}</td>
                <td class="text-center">
                    @if ($mapel->pivot->nilai_keterampilan >= 80)
                    A
                    @elseif ($mapel->pivot->nilai_keterampilan >= 70)
                    B
                    @elseif ($mapel->pivot->nilai_keterampilan >= 60)
                    C
                    @elseif ($mapel->pivot->nilai_keterampilan >= 50)
                    D
                    @else
                    E
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="headerr" style="text-align:center">

        <br>
        <br>
        <br>
        <br>
        <table style="border-collapse: collapse; width: 100%; margin: 0 auto;">
            <tr>
                <td style="padding: 5px; width: 20%;"></td>
                <td style="padding: 5px; width: 40%;"></td>
                <td style="padding: 5px; width: 40%; text-align: left;text-align: center;">Sokaraja, {{date('d F Y')}}</td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px; text-align: center;">&nbsp;Wali Kelas</td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px; "></td>
                <td style="padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                @if ($siswa->kelas && $siswa->kelas->guru)
                <td style="padding: 5px; text-align: center;">&nbsp;{{ $siswa->kelas->guru->nama }} {{ $siswa->kelas->guru->gelar }}</td>
                @else
                <p class="header">Wali kelas belum ada</p>
                @endif
            </tr>
            <tr>
                <td style="padding: 5px;"></td>
                <td style="padding: 5px;"></td>
                @if ($siswa->kelas && $siswa->kelas->guru)
                <td style="padding: 5px; text-align: center;">NIP. {{ $siswa->kelas->guru->nip }}</td>
                @else
                <p class="header">Wali kelas belum ada</p>
                @endif
            </tr>
        </table>
    </div>

    </div>

</body>

</html>