@props([
    "subject" => "model"
])

<div class="search-form overflow-x-hidden {{ $subject }}-search-form">
    <span class="input-group mb-2">
        <!-- search here -->
        <input
            type="search"
            class="form-control"
            id="{{ $subject }}-search"
            placeholder="Поиск"
        />
        <!-- <button type="button" class="btn btn-primary" id="{{ $subject }}-search">
            Искать
        </button> -->
    </span>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col">Представитель</th>
            </tr>
        </thead>
        <tbody id="{{ $subject }}-records">
            <!-- output here -->
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <button type="button" disabled class="btn btn-primary btn-pagination {{ $subject }}-pagination-prev">Пред.</button>
        <div class="text-center" id="{{ $subject }}-counter">
            <!-- page counter here -->
        </div>
        <button type="button" disabled class="btn btn-primary {{ $subject }}-pagination-next">След.</button>
    </div>
</div>
