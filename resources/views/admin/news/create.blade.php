@extends('admin.layout.master')

@section('title', 'Создать новость')

@section('content')
    <div>
        <h5 class="left-align">Создать новость</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">Заголовок</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="text" class="materialize-textarea" name="text"></textarea>
                    <label for="text">Текст</label>
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" accept="image/*" name="photo">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Загрузить фотографию">
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Создать
                        <i class="material-icons right">send</i>
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