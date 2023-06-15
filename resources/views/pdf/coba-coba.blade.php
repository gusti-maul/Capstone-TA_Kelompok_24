<!DOCTYPE html>
<html>

<head>
    <title>Transkrip Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <p class="header">Transkrip Nilai</p>
            <p>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $siswa->nama_lengkap }}</p>
            <p>Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $siswa->kelas->kelas }} - {{ $siswa->kelas->nama_kelas }}</p>
            <p>Tahun Ajaran&nbsp;&nbsp;&nbsp;: {{ $siswa->kelas->tapel->tapel }} Semester {{ $siswa->kelas->tapel->semester }}</p>
        </div>

    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nilai Pengetahuan</th>
                <th class="text-center">Grade Pengetahuan</th>
                <th class="text-center">Nilai Keterampilan</th>
                <th class="text-center">Grade Keterampilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa->mapel as $index => $mapel)
            <tr>
                <td class="text-center">{{ $index+1 }}</td>
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
        <div class="footer">
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <td style="width: 50%; text-align: left; font-size: 12px;">
                        Sokaraja, {{ date('d F Y') }}
                    </td>
                    <td style="width: 50%; text-align: right; font-size: 12px;">
                        Wali Kelas: {{ $siswa->kelas->guru->nama }}
                    </td>
                </tr>
                <tr>
                    <td style="height: 20px;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right; font-size: 12px;">
                        Nama Wali Kelas: {{ $siswa->kelas->guru->nama }}
                    </td>
                </tr>
            </table>
    </table>
</body>

</html>