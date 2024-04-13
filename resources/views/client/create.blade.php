@extends("layouts.master")

@section('title')Добавление клиента@endsection

@section('bar')
    <x-progressBar/>
@endsection

@section('content')
    <section class="pt-4">
        
        <form class="row" method="post">
            @csrf
            {{-- @error('*') --}}
            @if($errors->any())
            <div class="alert alert-danger d-flex flex-row" role="alert">
                <?php 
                $errors = json_decode($errors);
                ?>
                @foreach($errors as $error)
                    {{-- {{$error}} --}}
                    @foreach($error as $i)
                        {{-- FIXME --}}
                        {{$i}}<br>
                    @endforeach
                @endforeach
            </div>
            @endif
            {{-- @enderror --}}
            <div class="col-4">
            <h1 class="mb-4">@yield('title')</h1>

                <div class="mb-3">
                    <input required value="{{old('name_prefix')}}" type="text" class="form-control"   name="name_prefix" placeholder="Форма собственности" title="Название компании которое будет сокращаться">
                    <div class="form-text" id="basic-addon4">Сокращается. Например: "Общество с ограниченной ответственностью" преобразуется в ООО</div>
                </div>
                <div class="mb-3">
                    <input required value="{{old('company_name')}}" type="text" class="form-control" name="company_name" placeholder="Название организации">
                    <div class="form-text" id="basic-addon4">Название компании,прочий текст который не сокращается</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input required value="{{old('address')}}" type="text" class="form-control" name="address" id="address">
                </div>
                <input required value="{{old('phone')}}" type="text" class="form-control mb-3" name="phone" id="phone" placeholder="Контактный телефон">
                <div class="mb-5">
                    <h2>Представитель компании</h2>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ФИО</span>
                        <input required value="{{old('delegate_surname')}}" type="text" class="form-control" name="delegate_surname" id="delegate_surname">
                        <input required type="text" value="{{old('delegate_name')}}" class="form-control" name="delegate_name" id="delegate_name"  >
                        <input type="text" value="{{old('delegate_th_name')}}" class="form-control" name="delegate_th_name" id="delegate_th_name">
                    </div>
                    <label value="{{old('delegate_post')}}" for="delegate_post" class="form-label">Должность</label>
                    <input required value="{{old('delegate_post')}}" type="text"   class="form-control mb-3" name="delegate_post" id="delegate_post">
                </div>
            </div>
            <div class="col-4">
                <h2>Реквизиты</h2>
                <label class="form-label">БИК</label>
                <input required value="{{old('bik')}}"   type="text" class="form-control mb-3" name="bik">
                <label class="form-label">ИНН</label>
                <input required  value="{{old('inn')}}" type="text" class="form-control mb-3" name="inn">
                <label class="form-label">КПП</label>
                <input required value="{{old('kpp')}}" type="text" class="form-control mb-3" name="kpp">
                <label class="form-label">Расчетный счет</label>
                <input required value="{{old('payment_account')}}" type="text" class="form-control mb-3" name="payment_account">
                <label class="form-label">Кор. счет</label>
                <input required value="{{old('correspondent_account')}}"  type="text" class="form-control mb-3" name="correspondent_account">
                <select required class="form-select" aria-label="Default select example" name="bank_id" id="bank">
                    <option selected value="">Выберите банк</option>
                    @foreach ($banks as $bank)
                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">

            </div>
            <div class="col-4 pt-3">
                <input disabled type="submit" class="btn btn-success w-100">
            </div>
        </form>
    </section>
@endsection


@push('page-scripts')
@vite(['resources/js/create_form.js'])
@endpush