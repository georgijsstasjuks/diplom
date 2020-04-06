@extends('auth.layouts.master')

@section('title', 'Регистрация')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Регистрация</div>
            <form method="POST" action="{{ route('register') }}" aria-label="Register">
                @csrf
                @error('name')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="form-group row">
          
                    <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
      
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name"
                               value="">

                    </div>
                </div>

                @error('email')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control"
                               name="email" value="" >

                    </div>
                </div>

                @error('password')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control"
                               name="password" >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите
                        пароль</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               >
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </form>
            <div class="card-body">
            </div>
        </div>
    </div>
@endsection
