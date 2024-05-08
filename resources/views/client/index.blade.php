@extends('layouts.master')
{{-- {{ var_dump($clients) }} --}}

@section('style')
<style>

</style>
@endsection

@section('content')

<h1 class="pt-5">
    Все клиенты
</h1>
<div class="row gap-5">
    <div class="col-md" style="max-width: 1fr">
        <form action="#" class="pt-3 d-flex justify-content-between  mb-2">
            <div class="w-auto input-group rounded border-black border-1 border w-25">
                <input type="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0 bg-transparent " id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>

            <button type="button" disabled class="btn btn-outline-success">Редактировать</button>
            <button type="button" disabled class="btn btn-outline-danger">Удалить</button>
            <a href="{{route('client.create')}}" class="btn btn-outline-primary">Добавить</a>
        </form>


        <table class="table table-hover text-nowrap border">
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
            @forelse ($clients as $client)  
                <tr>
                    <td>
                        <input type="checkbox" class="btn-check" id="btncheck{{$client['id']}}">
                        <label class="btn btn-outline-primary  pt-3" for="btncheck{{$client['id']}}"></label>
                    </td>
                    <td class="pt-2 table_crop_m" title="{{$client->name_prefix_short}} {{$client->company_name}}">
                        {{$client->name_prefix_short}} {{$client->company_name}}
                    </td>
                    <td class="pt-2 table_crop_s" title="{{$client->delegate_surname}} {{$client->initials}}">
                        {{$client->delegate_surname}} {{$client->initials}}
                    </td>
                    <td class="pt-2 table_crop_s" title="{{$client->phone}}">
                        {{$client->phone}}
                    </td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td>Клиенты не найдены</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $clients->links('pagination::bootstrap-5') }}
    </div>
    <x-client-card  />
</div>
@endsection
