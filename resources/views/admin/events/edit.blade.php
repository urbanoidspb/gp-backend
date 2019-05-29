@extends('admin.layout.master')

@section('title', 'Изменить событие')

@section('content')
    <div>
        <h5 class="left-align">Изменить событие</h5>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('admin.events.update', $event) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title" value="{{ $event->title }}">
                    <label for="title">Заголовок</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="text" class="materialize-textarea" name="description">{{ $event->description }}</textarea>
                    <label for="text">Описание</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <div class="switch">
                        <label>
                            <input type="checkbox" name="is_relevant" @if($event->is_relevant) checked @endif>
                            <span class="lever"></span>
                            Актуально
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col input-field col s12">
                    <input type="text" class="datepicker" placeholder="Время проведения" name="time" value="{{ $event->time }}">
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
        $(document).ready(function(){
            $('.datepicker').datepicker();

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush