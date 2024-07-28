@extends('layouts.no-container')

@section('content')
    <div class="d-grid gap-3 g-row">
        <!-- form sidebar -->
        <form  method="post" class="flex-grow-1  g-col-3 g-col-md-4 ps-4">
            @csrf
            <h1 class="py-3">
                Новый договор
            </h1>
            <button type="submit" class="btn btn-outline-primary">Генерировать договор</button>
            <button type="submit" class="btn btn-outline-primary">Скачать договор</button>
            <button type="button" id="print" class="btn btn-outline-primary">Печатать договор</button>

            <section class="accordion py-2" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Выбор контрагента
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Выбор шаблона
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Пользовательские поля
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
                </div>
            </section>
        </form>
        <!-- form sidebar end -->
        <!-- preview -->
        <!-- <div class="flex-grow-1 px-3 py-2 col-sm-6 col-md-8 bg-secondary"> -->
        <div class="px-3 py-2 g-col-sm-6 g-col-md-8 bg-secondary">
            <h2 class="py-3">Предпросмотр</h2>
        </div>
        <!-- preview end -->
    </div>
@endsection
