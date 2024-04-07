@extends("layouts.master")

@section('content')
<x-progressBar/>
    <section class="pt-4">
        <h1 class="mb-4">Добавление клиента</h1>

        <form class="row">
            <div class="col-4">
                <input type="text" class="form-control mb-3" placeholder="Название организации">
                <input type="text" class="form-control mb-3" placeholder="Адрес">
                <input type="text" class="form-control mb-3" placeholder="Фамилия">
                <input type="text" class="form-control mb-3" placeholder="Имя">
                <input type="text" class="form-control mb-3" placeholder="Отчество">
                <input type="text" class="form-control mb-3" placeholder="Должность">
            </div>
            <div class="col-4">
                <input type="text" class="form-control mb-3" placeholder="БИК">
                <input type="text" class="form-control mb-3" placeholder="ИНН">
                <input type="text" class="form-control mb-3" placeholder="КПП">
                <input type="text" class="form-control mb-3" placeholder="Расч. счет">
                <input type="text" class="form-control mb-3" placeholder="Кор. счет">
            </div>
            <div class="col-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Выберите банк</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-4 pt-3">
                <div class="btn btn-success w-100 ">
                    Сохранить
                </div>
            </div>
        </form>
    </section>
@endsection
