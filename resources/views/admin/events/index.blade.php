@extends('admin.layout.master')

@section('title', 'События')

@section('content')
    <div>
        <h5 class="left-align">Список событий</h5>
    </div>
    <br>
    <div class="row">
        <div class="s12">
            <a href="{{ route('admin.events.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>

        <div class="row">
            <div class="s12">
                <ul class="collection">
                    @foreach($events as $event)
                        <li id="collection-news--{{ $event->id }}" class="collection-item">
                            <div class="right">
                                <a href="{{ route('admin.events.edit', $event) }}"
                                   class="waves-effect waves-light btn green lighten-2 tooltipped"
                                   data-position="bottom" data-tooltip="Редактировать">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form class="collection--delete-item" method="POST" action="{{ route('admin.events.destroy', $event) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button id="remove"
                                            class="waves-effect waves-light btn red lighten-1 tooltipped"
                                            data-position="bottom" data-tooltip="Удалить">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>


                            <span class="title">{{ $event->title }}</span>
                            <blockquote>{{ str_limit($event->description) }}</blockquote>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    {{ $events->links() }}
@endsection