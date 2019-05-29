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
                        <li id="collection-news--{{ $newsItem->id }}" class="collection-item">
                            <div class="right">
                                <a href="{{ route('admin.news.edit', $newsItem) }}"
                                   class="waves-effect waves-light btn green lighten-2 tooltipped"
                                   data-position="bottom" data-tooltip="Редактировать">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form class="collection--news-item" method="POST" action="{{ route('admin.news.destroy', $newsItem) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button id="remove"
                                            class="waves-effect waves-light btn red lighten-1 tooltipped"
                                            data-position="bottom" data-tooltip="Удалить">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>


                            <span class="title">{{ $newsItem->title }}</span>
                            <blockquote>{{ str_limit($newsItem->text) }}</blockquote>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    {{ $news->links() }}
@endsection