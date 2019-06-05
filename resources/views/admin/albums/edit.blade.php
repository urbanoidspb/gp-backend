@extends('admin.layout.master')

@section('title', 'Изменить событие')

@section('content')
    <div>
        <h5 class="left-align">Изменить событие</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.albums.update', $album) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title" value="{{ $album->title }}">
                    <label for="title">Заголовок</label>
                </div>
            </div>


            <div class="row">
                <div class="col input-field col s12">
                    <input type="text" class="datepicker" name="time" placeholder="Дата" value="{{ $album->time }}">
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>Файл</span>
                    <input type="file" multiple accept="image/*" name="photos[]">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Загрузить фотографии">
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

    <div class="row">
            <div class="col input-field col s12">
                @foreach($album->photos as $photo)
                <form method="post" class="photo-block" action="{{ route('admin.albums.images.delete',
                ['album' => $album, 'image' => $photo]) }}">
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
        $(document).ready(function(){
            $('.datepicker').datepicker();

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush