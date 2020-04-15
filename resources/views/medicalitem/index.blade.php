@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-15">
  <br />
  <h3 align="center">Medical Items</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <a href="{{route('medicalitem.create')}}" class="btn btn-primary">Add Medical Item +</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Item ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Edit</th>
   </tr>
   @foreach($items as $row)
   <tr>
    <td>{{$row->ItemID}}</td>
    <td>{{$row->Name}}</td>
    <td>{{$row->Description}}</td>
    <td><a href="{{route('medicalitem.edit', $row->ItemID)}}" class="btn btn-warning" value="EDIT">Edit</a></td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</div>
@endsection