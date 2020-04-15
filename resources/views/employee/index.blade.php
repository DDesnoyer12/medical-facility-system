@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-12">
  <br />
  <h3 align="center">Employee Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <a href="{{route('employee.create')}}" class="btn btn-primary">Add Employee +</a>
   <br />
   <br />    
   <h5>Sort by:</h5>
    <input type="radio" name="sort" value="all" id="all" checked>
    <label for="current">All Employees</label>
    <input type="radio" name="sort" value="physicians" id="physicians">
    <label for="current">Physicians</label>
    <input type="radio" name="sort" value="receptionists" id="receptionists">
    <label for="current">Receptionists</label>
  </div>

<table class="table table-bordered table-striped all">
   <tr>
    <th>Employee ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DoB</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Zip</th>
    <th>Department</th>
    <th>Emp Type</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($employees as $row)
   <tr>
    <td>{{$row->EID}}</td>
    <td>{{$row->FName}}</td>
    <td>{{$row->LName}}</td>
    <td>{{$row->DoB}}</td>
    <td>{{$row->Gender}}</td>
    <td>{{$row->Phone}}</td>
    <td>{{$row->Address}}</td>
    <td>{{$row->Zip}}</td>
    <td>{{$row->Department}}</td>
    <td>{{$row->Employee_Type}}</td>
    <td>
        <a href="{{route('employee.edit', $row->EID)}}" class="btn btn-warning" value="EDIT">Edit</a>
    </td>
    <td>
     <form method="post" class="delete_form" action="{{route('employee.delete', $row->EID)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>

  <table style="display: none;" class="table table-bordered table-striped physicians">
   <tr>
    <th>Employee ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DoB</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Zip</th>
    <th>Department</th>
    <th>Emp Type</th>
    <th>License No</th>
    <th>Specialty</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($physicians as $row)
   @if($row->Employee_Type == "Physician")
   <tr>
    <td>{{$row->EID}}</td>
    <td>{{$row->FName}}</td>
    <td>{{$row->LName}}</td>
    <td>{{$row->DoB}}</td>
    <td>{{$row->Gender}}</td>
    <td>{{$row->Phone}}</td>
    <td>{{$row->Address}}</td>
    <td>{{$row->Zip}}</td>
    <td>{{$row->Department}}</td>
    <td>{{$row->Employee_Type}}</td>
    <td>{{$row->LicenseNo}}</td>
    <td>{{$row->Specialty}}</td>
    <td>
        <a href="{{route('employee.edit', $row->EID)}}" class="btn btn-warning" value="EDIT">Edit</a>
    </td>
    <td>
     <form method="post" class="delete_form" action="{{route('employee.delete', $row->EID)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endif
   @endforeach
  </table>

  <table style="display: none;" class="table table-bordered table-striped receptionists">
   <tr>
    <th>Employee ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DoB</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Zip</th>
    <th>Department</th>
    <th>Emp Type</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($employees as $row)
   @if($row->Employee_Type == "Receptionist")
   <tr>
    <td>{{$row->EID}}</td>
    <td>{{$row->FName}}</td>
    <td>{{$row->LName}}</td>
    <td>{{$row->DoB}}</td>
    <td>{{$row->Gender}}</td>
    <td>{{$row->Phone}}</td>
    <td>{{$row->Address}}</td>
    <td>{{$row->Zip}}</td>
    <td>{{$row->Department}}</td>
    <td>{{$row->Employee_Type}}</td>
    <td>
        <a href="{{route('employee.edit', $row->EID)}}" class="btn btn-warning" value="EDIT">Edit</a>
    </td>
    <td>
     <form method="post" class="delete_form" action="{{route('employee.delete', $row->EID)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endif
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete this employee?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
$(document).ready(function() {
    $('input[type=radio][name=sort]').change(function() {
        if(this.value == "all") {
            $(".all").show();
            $(".physicians").hide();
            $(".receptionists").hide();
        }
        if(this.value == "physicians") {
            $(".all").hide();
            $(".physicians").show();
            $(".receptionists").hide();
        }
        if(this.value == "receptionists") {
            $(".all").hide();
            $(".physicians").hide();
            $(".receptionists").show();
        }
    })
})
</script>
@endsection