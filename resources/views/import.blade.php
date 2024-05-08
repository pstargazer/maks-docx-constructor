@extends('layouts.master')

@section('content')
<div class="row">
    <h1 class="py-3">Импортировать данные в таблицы</h1>    
    <form action="" method="post">
        @csrf
        <div class="input-group mb-3 w-50">
            <label class="input-group-text" for="inputGroupSelect01">Таблицы</label>
            <select class="form-select" id="inputGroupSelect01" name="table">
                <option selected value="all">Все</option>
                <option value="clients">Клиента</option>
                <option value="contacrts">Контракты</option>
                <option value="banks">Банки</option>
                <option value="levels">Уровни</option>
                <option value="grounds">Основания</option>
            </select>
        </div>
        <div class="input-group w-50">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Импортировать</button>
        </div>
    </form>
</div>
@endsection
