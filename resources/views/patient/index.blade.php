@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-13">
  <br />
  <h3 align="center">Patient Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <a href="{{route('patient.create')}}" class="btn btn-primary">Add Patient +</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Patient ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DoB</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Zip</th>
    <th>Insurance Type</th>
    <th>Insurance State</th>
    <th>Insurance Provider</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($patients as $row)
   <tr>
    <td>{{$row->PID}}</td>
    <td>{{$row->FName}}</td>
    <td>{{$row->LName}}</td>
    <td>{{$row->DoB}}</td>
    <td>{{$row->Gender}}</td>
    <td>{{$row->Phone}}</td>
    <td>{{$row->Address}}</td>
    <td>{{$row->Zip}}</td>
    <td>{{$row->IID}}</td>
    <td>{{$row->State}}</td>
    <td>{{$row->Provider}}</td>
    <td><a href="{{route('patient.edit', $row->PID)}}" class="btn btn-warning" value="EDIT">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{route('patient.delete', $row->PID)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete this patient?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection