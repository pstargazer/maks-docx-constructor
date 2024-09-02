@extends('layouts.master')

@section('content')

<h1 class="pt-5">
    Все шаблоны
</h1>
<div class="row gap-5">
    <div class="col-md" style="max-width: 1fr">
        <form action="#" class="pt-3 d-flex gap-2  mb-2">
            <div class="input-group rounded border-black border-1 border w-25">
                <input type="search" class="form-control rounded border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0 bg-transparent " id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
            <a href="{{route('template.create')}}" class="btn btn-outline-primary">Добавить</a>
        </form>


        <table class="table table-hover text-nowrap border">
            <thead>
                <tr>
                    <th>
                    </th>
                    <th>Название</th>
                    <th>Название файла</th>
                    <th>Посл-ть начало</th>
                    <th>Посл-ть конец</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($templates as $template)
                <tr>
                    <td>
                    </td>
                    <td>
                        {{$template->name}}
                    </td>
                    <td>
                        {{$template->filename}}
                    </td>
                    <td>
                        {{$template->escaping_start}}
                    </td>
                    <td>
                        {{$template->escaping_end}}
                    </td>
                    <td class="pt-0 mt-0">
                        <x-table.two-buttons id="$template->id" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td>Шаблоны не найдены</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
                {{ $templates->onEachSide(5)->links('pagination::bootstrap-5') }}
            </tfoot>
        </table>
    </div>
</div>
@endsection
