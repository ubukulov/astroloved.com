@extends('layouts.app')
@section('content')
    <div class="container">
        @isset($info)
            <div class="alert alert-success" role="alert">
                {{ $info }}
            </div>
        @endisset
        <h1>Добавление пользователей</h1>
        <form action="{{ route('es_store_user') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Имя" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            </div>

            <div class="form-group">
                <input @if($agent->isSafari()) type="date" @else type="text" @endif id="birth_date" placeholder="День рождения" name="birth_date" class="form-control" value="MM.DD.YY">
            </div>

            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Телефон">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>
@stop
