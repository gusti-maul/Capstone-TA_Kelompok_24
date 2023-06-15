@extends('dashboard.layouts.main')
@section('container')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/jadwalujian">Jadwal Ujian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Ujian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form action="/jadwalujian/tambah" method="POST">
                    @csrf
                    <div class="container">
                        <h1>Tambah Jadwal Ujian</h1>
                        <div class="form-group">
                            <label for="tanggal_ujian">Tanggal Ujian</label>
                            <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="time" name="jam" id="jam" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="ruangan">Ruangan Ujian</label>
                            <input type="text" name="ruangan" id="ruangan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mapel_id">Mapel</label>
                            <select name="mapel_id" id="mapel_id" class="form-control" required>
                                @foreach ($mapel as $m)
                                @if ($m->tapel)
                                <option value="{{ $m->id }}">{{$m->kode_mapel}} | {{ $m->mapel }} | {{$m->tapel->tapel}} Semester {{$m->tapel->semester}}</option>
                                @else
                                <option value="{{ $m->id }}">{{ $m->mapel }} | Belum ada tahun ajaran</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                @foreach ($kelas as $k)
                                @if ($k->tapel)
                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }} | {{ $k->tapel->tapel }} Semester {{ $k->tapel->semester }}</option>
                                @else
                                <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->nama_kelas }} | Belum ada tahun ajaran</option>
                                @endif
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    document.getElementById('tanggal_ujian').addEventListener('change', function() {
        var selectedDate = new Date(this.value);
        var selectedDay = selectedDate.toLocaleDateString('id-ID', {
            weekday: 'long'
        });
        var hariSelect = document.getElementById('hari');
        var options = hariSelect.options;

        // Menghapus opsi hari yang ada sebelumnya
        for (var i = options.length - 1; i >= 0; i--) {
            options[i].remove();
        }

        // Menambahkan opsi hari sesuai tanggal yang dipilih
        var option = document.createElement('option');
        option.value = selectedDay;
        option.text = selectedDay;
        hariSelect.add(option);
    });
</script>
@endsection