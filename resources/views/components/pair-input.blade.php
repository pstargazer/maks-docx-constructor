@props([
    "subject" => "model"
])


<div class="pair-inputs" id="{{ $subject }}-pairform">
    <span class="pair input-group">
        <input type="text" name="" id="" class="form-control" placeholder="Ключ">
        <input type="text" name="" id="" class="form-control" placeholder="Значение">
        <button type="button" class="btn btn-primary create-pair">
            <i class="bi bi-clipboard-plus"></i>
        </button>
        <button type="button" disabled class="btn btn-danger create-pair">
            <i class="bi bi-clipboard-minus"></i>
        </button>
    </span>
    <div id="new-pairs" id="{{ $subject }}-pairs">
        <!-- new inputs here -->
    </div>
</div>
