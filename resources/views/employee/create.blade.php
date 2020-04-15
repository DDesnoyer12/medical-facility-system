@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">New Employee</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{route('employee.insert')}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Employee ID:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID" />
   </div>
   <div class="form-group">
    <span>First Name:</span>
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <span>Last Name:</span>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <span>Date of Birth:</span>
    <input type="date" name="date_of_birth" class="form-control" placeholder="Enter Date of Birth" />
   </div>
   <div class="form-group">
    <span>Gender:</span>
    <select class="form-control" id="gender" name="gender" placeholder="Gender">
        <option value="" disabled selected>Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
        <option value="O">Other</option>
    </select>
   </div>
   <div class="form-group">
    <span>Phone:</span>
    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" />
   </div>
   <div class="form-group">
    <span>Address:</span>
    <input type="text" name="address" class="form-control" placeholder="Enter Address (without ZipCode)" />
   </div>
   <div class="form-group">
    <span>ZipCode:</span>
    <select class="form-control" id="zipcode" name="zip_code">
        <option value="" disabled selected>Zip Code</option>
        @foreach($zips as $row)
            <option value="{{$row->Zip}}">{{$row->Zip}} | {{$row->City}} | {{$row->State}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Department:</span>
    <select class="form-control" id="department" name="department">
        <option value="" disabled selected>Department</option>
        @foreach($depts as $row)
            <option value="{{$row->DID}}">{{$row->DID}} | {{$row->DeptName}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Employee Type:</span>
    <select class="form-control" id="empType" name="emptype">
        <option value="" disabled selected>Employee Type</option>
        <option value="Receptionist">Receptionist</option>
        <option value="Physician">Physician</option>
    </select>
   </div>
   <div class="form-group physician-info" style="display: none;">
    <span>License Number:</span>
    <input type="text" name="license_no" class="form-control"  placeholder="Physician License No" />
   </div>
   <div class="form-group physician-info" style="display: none;">
    <span>Specialty:</span>
    <input type="text" name="specialty" class="form-control" placeholder="Physician Specialty" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
<script>
    $(document).ready(function() {
        $("#empType").change(function() {
            if($("#empType").val() == "Physician") {
                $(".physician-info").show();
            } else {
                
                $(".physician-info").hide();
            }
        })
    })
</script>
@endsection