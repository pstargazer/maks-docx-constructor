@extends('layouts.master')

@section('title')@yield('index-title')@endsection

@section('content')

<h1 class="pt-5">
    Все клиенты
</h1>
<div class="row gap-5">
    <div class="col-md" style="max-width: 1fr">
        <form method="get" action="{{route('client.index')}}" class="pt-3 d-flex gap-2  mb-2">
            <div class="w-auto input-group rounded border-black border-1 border w-25">
                @if(isset($_GET['search']))
                <input value="{{$_GET['search']}}" name="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                @else
                <input name="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                @endif
                <!-- <button type="submit"> -->
                    <span class="input-group-text border-0 bg-transparent cursor" id="search-addon">
                        <i class="bi bi-search"></i>
                    </span>
                <!-- </button> -->
            </div>
            @stack('top-buttons')
        </form>

        @yield('index-table')
    </div>
    
    <div class="col-sm"> 
        @yield('preview')
    </div>

</div>
@endsection

@push('page-scripts') @vite(['resources/js/indexes/index_page.js']) @endpush