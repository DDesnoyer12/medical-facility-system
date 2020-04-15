@extends('master')

@section('content')
<div style="text-align: center;" class="row">
 <div class="col-lg-15">
  <br />
  <h3 align="center">Departments</h3>
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
    <th>Department ID</th>
    <th>Department Name</th>
   </tr>
   @foreach($depts as $row)
   <tr>
    <td>{{$row->DID}}</td>
    <td>{{$row->DeptName}}</td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</div>
@endsection