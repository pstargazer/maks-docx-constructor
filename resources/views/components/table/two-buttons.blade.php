@props(["id"])
<div class=" flex gap-5 align-items-center pt-0 float-end ">
    <button class="btn fs-4 icon-link-hover icon-link table_btn edit_btns" title="редактировать" role="button" data-id="{{$id}}">
        <i class="bi bi-pencil " ></i>
    </button>
    <button class="btn fs-4 icon-link-hover icon-link table_btn trash_btns" title="удалить" role="button" data-id="{{$id}}">
        <i class="bi bi-trash"></i>
    </button>
</div>
