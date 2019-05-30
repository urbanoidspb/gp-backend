@extends('admin.layout.master')

@section('title', 'Создать альбом')

@section('content')
    <div>
        <h5 class="left-align">Создать альбом</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.albums.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">Заголовок</label>
                </div>
            </div>


            <div class="row">
                <div class="col input-field col s12">
                    <input type="text" class="datepicker" name="time" placeholder="Дата">
                </div>
            </div>

            <form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Загрузить фотографии">
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit">Создать
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

        $(document).ready(function(){
            $('.datepicker').datepicker();

            $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
        });
    </script>
@endpush