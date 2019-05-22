@extends('admin.layout.master')

@section('base')
    <div class="card">
        <div class="card-content grey lighten-4">
            <span class="card-title">Авторизация в панель администратора</span>
            <div class="row">
                <form class="col s12" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="login" name="login" type="text">
                            <label for="login">Логин</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="password" name="password" type="password">
                            <label for="password">Пароль</label>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="action">Логин</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            @if (session()->has('fail'))
            message('{{ session('fail') }}');
            @endif
        });
    </script>
@endpush

@push('head')
    <style>
        body {
            background-color: #EEEEEE;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='36' height='72' viewBox='0 0 36 72'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23fbf8f8' fill-opacity='0.4'%3E%3Cpath d='M2 6h12L8 18 2 6zm18 36h12l-6 12-6-12z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .container {
            margin-top: 150px;
        }
    </style>
@endpush