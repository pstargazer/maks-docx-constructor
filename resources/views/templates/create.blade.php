@extends('layouts.master')
@section('content')
<section class="pt-4">
    <h1>Новый шаблон</h1>
    <form class="row" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @error('*') --}}
        @if($errors->any())
        <div class="alert alert-danger d-flex flex-row" role="alert">
            <?php $errors = json_decode($errors); ?>
            @foreach($errors as $error)
                {{-- {{$error}} --}}
                @foreach($error as $i)
                    {{-- FIXME --}}
                    {{$i}}<br>
                @endforeach
            @endforeach
        </div>
        @endif
        {{-- @enderror --}}
        <div class="col-3">
            <div class="mb-3">
                <label for="name">Имя шаблона</label>
                <input required class="form-control" type="text" name="name" id="name">
                <div id="nameHelp" class="form-text">Имя шаблона,которое будет показано в системе</div>
            </div>
            <div class="mb-3">
                <label for="file">Файл шаблона</label>
                <input required class="form-control" type="file" name="file" id="file">
            </div>
            <div class="mb-3">
                <label for="escaping_start">Экранирующие последовательности</label>
                <!-- <input required class="form-control" type="" name="file" id="name"> -->
                <div class="input-group">
                    <input required placeholder="Начало" class="form-control" value="{" type="text" name="escaping_start" id="escaping_start">
                    <input required placeholder="Конец" class="form-control" value="}" type="text" name="escaping_end" id="escaping_end">
                </div>
                <div id="escapingHelp" class="form-text">Последовательности для определения переменной в шаблоне</div>
            </div>
            <button class="btn btn-success w-100" type="submit">Отправить</button>
        </div>
    </form>
</section>
@endsection
