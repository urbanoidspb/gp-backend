@extends('admin.layout.master')

@section('title', 'Создать новость')

@section('content')
    <div>
        <h5 class="left-align">Создать новость</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.news.update', $news) }}" method="post">
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

            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Изменить
                        <i class="material-icons right">border_color</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        M.textareaAutoResize($('#text'));
    </script>
@endpush