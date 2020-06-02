@extends('layouts.app')

<style>
    .logo{
        width: 200px;
        height: 200px;
    }
    body {
        background: url(imagenes/sistemas/fondo232.jpg) no-repeat center top;
        margin: auto;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        text-align: center;
    }
</style>

@section('content')
@include('sweetalert::alert')
<script>
    $(document).ready(function(){
        $('.container').fadeIn(2000);
    });
</script>

<div class="container" style="display: none;">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" id="disapeard" style="margin-top:40px; box-shadow: 3px 3px 1px 0px rgba(0,0,0,0.75);">


                <div class="card-body">

                    <center><img src="{{ url('imagenes/sistemas/helios-mas-cerrado2.png') }}" class="logo"></center>
                    <center><h3>Ingrese sus datos</h3></center>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input placeholder="Ingrese su correo" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input placeholder="Ingrese su contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Ingrese al sistema') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
