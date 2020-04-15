@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-15">
  <br />
  <h3 align="center">Rooms</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Room ID</th>
    <th>Department ID</th>
   </tr>
   @foreach($rooms as $row)
   <tr>
    <td>{{$row->RID}}</td>
    <td>{{$row->Department}}</td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</div>
@endsection