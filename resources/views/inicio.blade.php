@extends('welcome')
@section('content')
		<div class="content">
                <div class="title m-b-md">
                    Inmobiliaria API
                </div>

                <div class="links">
                    <a href="{{ route('instalacion') }}">Instalación</a>
                    <a href="#">Documentación</a>
                    <a href="{{ route('routes') }}">URLS</a>
                </div>
            </div>
@endsection