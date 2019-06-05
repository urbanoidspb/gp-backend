@extends('admin.layout.master')

@section('title', 'Изменить новость')

@section('content')
    <div>
        <h5 class="left-align">Изменить новость</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.news.update', $news) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title" value="{{ $news->title }}">
                    <label for="title">Заголовок</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="text" class="materialize-textarea" name="text">{{ $news->text }}</textarea>
                    <label for="text">Текст</label>
                </div>
            </div>

            @if(count($news->photos) == 0)
            <div class="file-field input-field">
                <div class="btn">
                    <span>Файл</span>
                    <input type="file" accept="image/*" name="photo">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Загрузить фотографию">
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Изменить
                        <i class="material-icons right">border_color</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col input-field col s12">
            @foreach($news->photos as $photo)
                <form method="post" class="photo-block" action="{{ route('admin.news.images.delete',
                ['news' => $news, 'image' => $photo]) }}">
                    @method('delete')
                    @csrf
                    <img alt="#" class="z-depth-2" src="{{ $photo->path }}" width="93" height="100">
                    <br>
                    <button class="waves-effect waves-light btn-small red">Удалить</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        M.textareaAutoResize($('#text'));
    </script>
@endpush