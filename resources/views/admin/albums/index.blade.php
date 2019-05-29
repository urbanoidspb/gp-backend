@extends('admin.layout.master')

@section('title', 'Альбомы')

@section('content')
    <div>
        <h5 class="left-align">Список альбомов</h5>
    </div>
    <br>
    <div class="row">
        <div class="s12">
            <a href="{{ route('admin.albums.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>

        <div class="row">
            <div class="s12">
                <ul class="collection">
                    @foreach($albums as $album)
                        <li id="collection-news--{{ $album->id }}" class="collection-item">
                            <div class="right">
                                <a href="{{ route('admin.albums.edit', $album) }}"
                                   class="waves-effect waves-light btn green lighten-2 tooltipped"
                                   data-position="bottom" data-tooltip="Редактировать">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form class="collection--delete-item" method="POST" action="{{ route('admin.albums.destroy', $album) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button id="remove"
                                            class="waves-effect waves-light btn red lighten-1 tooltipped"
                                            data-position="bottom" data-tooltip="Удалить">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>


                            <span class="title">{{ $album->title }}</span>
                            <blockquote><b>Дата создания: </b> {{ $album->time }}</blockquote>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    {{ $albums->links() }}
@endsection