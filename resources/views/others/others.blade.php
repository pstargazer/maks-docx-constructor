@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <form action="#" class="pt-3 d-flex gap-3 mb-4">
            <div class="input-group rounded border-black border-1 border w-25">
                <input type="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0 bg-transparent " id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
            <button type="button" class="btn btn-outline-success">Редактировать</button>
            <button type="button" class="btn btn-outline-danger">Удалить</button>
        </form>
    </div>
    <div class="col-12 d-flex">
        <div class="col-4 ">
            <h2>Банки</h2>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="btn-check" id="btncheckAllBanks">
                            <label class="btn btn-outline-primary  pt-3" for="btncheckAllBanks"></label>
                        </th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                            </td>
                            <td class="pt-2">КМ-ЗПДНа-2018-2</td>
                            <td class="pt-0 mt-0">
                                <x-table.TwoButtons/>
                            </td>
                        </tr>
                        {{-- add element --}}
                        <x-table.add-element-row/>
                        {{-- cancel add element --}}
                        <x-table.cancel-add-element/>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2>Уровни облсуживания</h2>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="btn-check" id="btncheckAllLevels">
                            <label class="btn btn-outline-primary  pt-3" for="btncheckAllLevels"></label>
                        </th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                            </td>
                            <td class="pt-2">КМ-ЗПДНа-2018-2</td>
                            <td class="pt-0 mt-0">
                                <x-table.TwoButtons/>
                            </td>
                        </tr>

                        {{-- add element --}}
                        <x-table.add-element-row/>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <h2>Основания</h2>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="btn-check" id="btncheckAllGrounds">
                            <label class="btn btn-outline-primary  pt-3" for="btncheckAllGrounds"></label>
                        </th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary  pt-3" for="btncheck1"></label>
                            </td>
                            <td class="pt-2">КМ-ЗПДНа-2018-2</td>
                            <td class="pt-0 mt-0">
                                <x-table.TwoButtons/>
                            </td>
                        </tr>

                        {{-- add element --}}
                        <x-table.add-element-row/>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
