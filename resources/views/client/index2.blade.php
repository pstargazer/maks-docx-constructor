@extends('layouts.index')

@section('index-title', "Список клиентов | {env('APP_NAME')}")

@push('top-buttons') <a href="{{route('client.create')}}" class="btn btn-outline-primary">Добавить</a>@endpush
@push('top-buttons') <button type="button" disabled class="btn btn-success">Редактировать</button>@endpush
@push('top-buttons') <button type="button" disabled class="btn btn-danger">Удалить</button>@endpush


@section('index-table')
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
    {{-- @yield('index-table') --}}
     @forelse ($clients as $client)  
        <tr data-id="{{$client['id']}}">
            <td>
                <input type="checkbox" class="btn-check" id="btncheck{{$client['id']}}">
                <label class="btn btn-outline-primary  pt-3" for="btncheck{{$client['id']}}"></label>
            </td>
            <td class="pt-2 table_crop_m clickable" title="{{$client->name_prefix_short}} {{$client->company_name}}">
                {{$client->name_prefix_short}} {{$client->company_name}}
            </td>
            <td class="pt-2 table_crop_s clickable" title="{{$client->delegate_surname}} {{$client->initials}}">
                {{$client->delegate_surname}} {{$client->initials}}
            </td>
            <td class="pt-2 table_crop_s clickable" title="{{$client->phone}}">
                {{$client->phone}}
            </td>
            <td class="pt-0 mt-0">
                <x-table.two-buttons :id="$client['id']"/>
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
   
@endsection

@section('preview')
    @if (!empty($single))
        <x-client-card :data="$single" zoom="5"/>
    @endif
@endsection

@push('page-scripts') @vite(['resources/js/indexes/index_page.js']) @endpush
