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
    </span>
    <table class="table w-full">
        <thead>
            <tr id="{{ $subject }}-thead">
                <!-- table header -->
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
