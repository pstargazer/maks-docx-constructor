@extends('layouts.master')

@section('content')

<h1 class="pt-5">
    Все договоры
</h1>

<form action="#" class="pt-3 d-flex gap-3 mb-4">
    <div class="input-group rounded border-black border-1 border w-25">
        <input type="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0 bg-transparent " id="search-addon">
            <i class="bi bi-search"></i>
        </span>
    </div>

    <button type="button" class="btn btn-outline-primary">Распечатать</button>
    <button type="button" class="btn btn-outline-success">Редактировать</button>
    <button type="button" class="btn btn-outline-danger">Удалить</button>
</form>

<div class="row">
    <div class="col-9">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="btn-check" id="btncheckAll">
                            <label class="btn btn-outline-primary  pt-3" for="btncheckAll"></label>
                        </th>
                        <th>Название</th>
                        <th>Клиент</th>
                        <th>Дата создания</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <td>
                                <input type="checkbox" class="btn-check" id="btncheck{{$contract->id}}">
                                <label class="btn btn-outline-primary  pt-3" for="btncheck{{$contract->id}}"></label>
                            </td>
                            <td class="pt-2">КМ-ЗПДНа-2018-2</td>
                            <td class="pt-2">МАОУДО «ЭДМШ»</td>
                            <td class="pt-2">29.12.2017</td>
                            <td class="pt-0 mt-0">
                                <x-table.buttons/>
                            </td>
                        </tr>
                    @endforeach
                        {{-- <tr class="">
                            <td>
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                            </td>
                            <td class="pt-2">КМ-ЗПДНа-2018-2</td>
                            <td class="pt-2">МАОУДО «ЭДМШ»</td>
                            <td class="pt-2">29.12.2017</td>
                            <td class="pt-0 mt-0">
                                <x-table.buttons/>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- {{ $contracts->links() }}  //pagination --}}
    </div>
    <!-- ./col -->
</div>
@endsection
