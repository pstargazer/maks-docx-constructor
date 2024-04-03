@extends('layouts.master')
{{-- {{ var_dump($clients) }} --}}

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)        
        <tr>
            <th scope="row">
                <input type="checkbox" name="" id="">
            </th>
            <td>{{$client->name_prefix_short}} {{$client->company_name}}</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
    @endforeach

  </tbody>
</table>
@endsection