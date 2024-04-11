@extends("layouts.master")

@section("content")
<div class="row">
    <h1 class="py-3">Администраторная будка</h1>
    <div class="col-md-6">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ф.И.О</th>
                <th scope="col">Почта</th>
                <th scope="col">Является админом</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th class="pt-3" scope="row">1</th>
                <td class="pt-3 table_crop_s">{{$user->name}}</td>
                <td class="pt-3 table_crop_s">{{$user->email}}</td>
                <td class="pt-3 table_crop_s">{{(bool)($user->is_admin)}}</td>
                <td><x-table.admin-buttons/></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
<button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover">
  Popover on right
</button>

<button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
@endsection