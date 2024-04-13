@extends('layouts.master')

@section('title')@yield('index-title')@endsection

@section('content')

<h1 class="pt-5">
    Все клиенты
</h1>
<div class="row gap-5">
    <div class="col-md" style="max-width: 1fr">
        <form method="get" action="{{route('client.index')}}" class="pt-3 d-flex justify-content-between  mb-2">
            <div class="w-auto input-group rounded border-black border-1 border w-25">
                <input value="{{$_GET['search']}}" name="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <!-- <button type="submit"> -->
                    <span class="input-group-text border-0 bg-transparent cursor" id="search-addon">
                        <i class="bi bi-search"></i>
                    </span>
                <!-- </button> -->
            </div>

            <button type="button" disabled class="btn btn-success">Редактировать</button>
            <button type="button" disabled class="btn btn-danger">Удалить</button>
            <a href="{{route('client.create')}}" class="btn btn-outline-primary">Добавить</a>
        </form>

        @yield('index-table')
        {{-- <table class="table table-hover text-nowrap border">
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
            @yield('index-table')
            
           
            </tbody>
        </table>
        {{ $clients->links('pagination::bootstrap-5') }} --}}
    </div>
    
    <div class="col-sm"> 
        @yield('preview')
    </div>

</div>
@endsection