<!DOCTYPE html>
<html>

<head>
    <title>terimakasih</title>
</head>

<body>
    <script>
        var yakin = alert("Terimakasih Telah Mendaftar, Tunggu aktivasi oleh Admin!!! Mohon Tunggu Approval dari Admin Kami");

        (yakin)
        window.location = "{{ url('register') }}";
    </script>
</body>

</html>

<!-- @extends('auth.index')
@section('content')
<section class="section about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 align-self-center">
                <div class="content-block">
                    <h2>Terima Kasih <span class="alternate">Sudah Registrasi User</span></h2>
                    <div class="description-one">
                        <p>Mohon Tunggu Approval dari Admin Kami</p>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('register') }}" class="btn btn-main-md">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->