@extends('layouts.master')
{{-- {{ var_dump($clients) }} --}}

@section('content')

<h1 class="pt-5">
    Все клиенты
</h1>
<div class="row gap-5">
    <div class="col-7">
        <form action="#" class="pt-3 d-flex gap-3 mb-2">
            <div class="input-group rounded border-black border-1 border w-25">
                <input type="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0 bg-transparent " id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>

            <button type="button" class="btn btn-outline-success">Редактировать</button>
            <button type="button" class="btn btn-outline-danger">Удалить</button>
        </form>


        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" class="btn-check" id="btncheckAll">
                    <label class="btn btn-outline-primary  pt-3" for="btncheckAll"></label>
                </th>
                <th>Название</th>
                <th>Ф.И.О</th>
                <th>Телефон</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
                <tr class="">
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck1">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                    </td>
                    <td class="pt-2">МАОУДО «ЭДМШ»</td>
                    <td class="pt-2">Якимова О.Ф.</td>
                    <td class="pt-2">63-14-22</td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <x-client-card/>
    {{-- {{ $clients->links() }}  //pagination --}}
</div>
@endsection
