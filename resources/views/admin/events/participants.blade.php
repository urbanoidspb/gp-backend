@extends('admin.layout.master')

@section('title', 'Участники события')

@section('content')
    @if(count($participants) > 0)
    <ul class="collection">
        @foreach($participants as $participant)
        <li class="collection-item">
            <span class="title">{{ $participant->email }}</span>
            <p>Имя: <b>{{ $participant->first_name }}</b><br>
                Фамилия: <b>{{ $participant->last_name }}</b><br>
                Отчество: <b>{{ $participant->patronymic }}</b><br>
                Номер телефона: <b>{{ $participant->phone }}</b>
            </p>
        </li>
        @endforeach
    </ul>

    {{ $participants->links() }}

    @else
    <span>Участников нет</span>
    @endif
@endsection
