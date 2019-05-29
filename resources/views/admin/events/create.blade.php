@extends('admin.layout.master')

@section('title', 'Создать событие')

@section('content')
    <div>
        <h5 class="left-align">Создать событие</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.events.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">Заголовок</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="text" class="materialize-textarea" name="description"></textarea>
                    <label for="text">Описание</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <div class="switch">
                        <label>
                            <input type="checkbox">
                            <span class="lever"></span>
                            Актуально
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col input-field col s12">
                    <input type="text" class="datepicker" name="time" placeholder="Время проведения">
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

        $(document).ready(function(){
            $('.datepicker').datepicker();
        });
    </script>
@endpush