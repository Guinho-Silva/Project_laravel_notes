@extends('layouts.main_layout')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5">
                
                <!-- logo -->
                <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>

                <!-- form -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <!-- novalidade remove a validação do HTML -->
                        <form action="/loginSubmit" method="post" novalidate>
                            <!-- Injeta no formula de forma automatica pelo laravel um token que protege contra atks hackers, quando inspencionar a pagina, o laravel colocará no name = "_token"-->
                            @csrf
                            <div class="mb-3">
                                <label for="text_username" class="form-label">Username</label>
                                <input type="email" class="form-control bg-dark text-info" name="text_username"value ="{{ old('text_username') }}" required>
                                <!-- Mostra o Erro -->
                                @error('text_username')

                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                <!-- Tirando o require para concentrar a validação no authcontroller -->
                            </div>
                            <div class="mb-3">
                                <label for="text_password" class="form-label">Password</label>
                                <input type="password" class="form-control bg-dark text-info" name="text_password" value ="{{ old('text_password') }}"required>
                                <!-- Mostra o Erro -->
                                @error('text_password')

                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                            </div>
                        </form>

                        <!-- Login Inválido -->
                         @if(session('loginErro'))
                            <div class="alert alert-danger text-center mt-3">
                                {{ session('loginErro') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- copy -->
                <div class="text-center text-secondary mt-3">
                    <small>&copy; <?= date('Y') ?> Notes</small>
                </div>

                <!-- errors -->

                <!-- @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="m-0">
                            @foreach($errors->all() as $error)

                                <li>{{ $error}}</li>

                            @endforeach
                        </ul>
                    </div>
                @endif -->

            </div>
        </div>
    </div>
</div>
@endsection