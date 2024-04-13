{{-- <div class="col-sm"> --}}
@props(['data',"zoom"])
    <h2 class="py-4">Предпросмотр</h2>
    <hr class="mb-0">
    <p class="mb-0">{{$data->name_prefix}} {{$data->company_name}}</p>
    <hr class="my-0">
    {{-- <div class="d-flex align-items-center gap-3 pt-2"> --}}
    <div>
        <h4 class="mb-0">{{$data->name_prefix_short}} {{$data->company_name}}</h4>
        <p class="mb-0 fs-5">{{$data->phone}}</p>
    </div>
    <a href="#" class="fs-5">{{$data->address}} </a>
    <div class="d-flex">

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d{{$zoom}}!2d{{$data->lon}}!3d{{$data->lat}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1712472076432!5m2!1sru!2sru" height="295" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60569.619324912965!2d50.8002304!3d61.679206399999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1712472076432!5m2!1sru!2sru" height="295" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div>
    <div class="d-flex mt-2 flex-wrap gap-5" style="width: 650px">
        <div class="" style="width: 72px">
            <h6 class="" >БИК</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">{{$data->bik}}</p>
            </div>
        </div>
        <div class="" style="width: 80px">
            <h6 class="">ИНН</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; weight:100%; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">{{$data->inn}}</p>
            </div>
        </div>
        <div class="" style="width: 72px">
            <h6 class="">КПП</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; weight:100%; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">{{$data->kpp}}</p>
            </div>
        </div>
        <div class="" style="width: 220px">
            <h6 class="">Банк</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; width:220px; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">{{$data->bank}}</p>
            </div>
        </div>
        <div class="" style="width: 170px">
            <h6 class="">Кор. счет</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; weight:100%; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">30101810400000000640</p>
            </div>
        </div>
        <div class="" style="width: 170px">
            <h6 class="">Расч. счёт</h6>
            <div class="spoiler bg-black  position-absolute z-1 rounded-1 " style="height:2%; weight:100%; transition: 0.5s;">
                <p class="position-relative z-2 user-select-none text-black ">40703810428000008504</p>
            </div>
        </div>
    </div>
{{-- </div> --}}
