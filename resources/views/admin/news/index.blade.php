@extends('admin.layout.master')

@section('title', 'Новости')

@section('content')
    <div>
        <h5 class="left-align">Список новостей</h5>
    </div>
    <br>
    <div class="row">
        <div class="s12">
            <a href="{{ route('admin.news.create') }}" class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>

        <div class="row">
            <div class="s12">
                <ul class="collection">
                    @foreach($news as $newsItem)
                        <li id="collection-news--{{ $newsItem->id }}" class="collection-item row" style="display: flex; flex-direction: row;">
                            <div>
                            @if(count($newsItem->photos) > 0)
                                <img align="left" style="max-height: 85px; width: auto; margin-right: 1rem" src="{{ $newsItem->photos[0]->path }}">
                            @endif
                            </div>
                            <span style="align-self: center">
                                <span class="title">{{ $newsItem->title }}</span><br>
                                <blockquote class="truncate">{!! Str::limit(strip_tags($newsItem->text)) !!}</blockquote>
                            </span>
                            <div style="margin-left: auto">
                                <a href="{{ route('admin.news.edit', $newsItem) }}"
                                   class="waves-effect waves-light btn green lighten-2 tooltipped"
                                   data-position="bottom" data-tooltip="Редактировать">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form class="collection--delete-item" method="POST" action="{{ route('admin.news.destroy', $newsItem) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button id="remove"
                                            class="waves-effect waves-light btn red lighten-1 tooltipped"
                                            data-position="bottom" data-tooltip="Удалить">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    {{ $news->links() }}
@endsection