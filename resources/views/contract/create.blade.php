@extends('layouts.no-container')
@section('content')
@vite(['resources/js/contract/create.js'])


<!-- <div class="d-grid"> -->
<div class="form-grid ">
    <!-- form sidebar -->
    <!-- <form  method="post" class="flex-grow-1 g-col-3 g-col-md-4 ps-4"> -->
    <form method="post" class=" ps-4 pe-3 overflow-y-auto">
        @csrf
        <h1 class="py-3">Новый договор</h1>
        <span class="input-group">
            <button type="button" id="store" title="Сохранить документ в БД" class="btn btn-primary">
                <i class="bi bi-floppy2 me-1"></i> Сохранить
            </button>
            <!-- <button type="button" title="Обновить документ" class="btn btn-secondary">
                <i class="bi bi-arrow-clockwise"></i>
            </button> -->
            <button type="button" title="Скачать" class="btn btn-secondary">
                <i class="bi bi-file-earmark-arrow-down"></i>
            </button>
            <button type="button" id="print" title="Печатать" class="btn btn-secondary">
                <i class="bi bi-printer"></i>
            </button>
        </span>

        <section class="accordion py-2" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne"
                        aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne"
                    >
                        Выбор контрагента
                    </button>
                </h2>
                <div
                    id="panelsStayOpen-collapseOne"
                    class="accordion-collapse collapse show"
                >
                    <div class="accordion-body">
                        <x-search-form subject="clients" />
                        <a href="{{route('client.create')}}" class="btn btn-outline-primary w-100 mt-2" target="_blank" title="открыть новую вкладку для создания нового клиента">
                            Новый клиент
                        </a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo"
                    >
                        Выбор шаблона
                    </button>
                </h2>
                <div
                    id="panelsStayOpen-collapseTwo"
                    class="accordion-collapse collapse"
                >
                    <div class="accordion-body">
                        <x-search-form subject="templates" />

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree"
                    >
                        Пользовательские поля
                    </button>
                </h2>
                <div
                    id="panelsStayOpen-collapseThree"
                    class="accordion-collapse collapse"
                >
                    <div class="accordion-body">
                        <x-pair-input subject="contract-values" />
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- form sidebar end -->
    <!-- preview -->
    <!-- <div class="flex-grow-1 px-3 py-2 col-sm-6 col-md-8 bg-secondary"> -->
    <div class="px-3 py-2 bg-secondary overflow-y-auto">
        <h2 class="py-3">Предпросмотр</h2>
        <x-doc-preview subject="templates" />
    </div>
    <!-- preview end -->
</div>
<!-- </div> -->
@endsection
