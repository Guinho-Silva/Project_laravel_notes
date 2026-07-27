<!-- php artisan make:view --nome da view-- -->

@extends('layouts.main_layout')

@section('conteudo')
    <h1>Welcome View and Blade!</h1>

    <hr>

    <!-- Usando a estrutura do php -->

    <!-- <h3>The values is:</h3> -->


    <!-- Usando a estrutura do blade ao invés de php -->
    <h3>Page 2</h3>
    <h3>The values is: {{ $value }}</h3>

@endsection