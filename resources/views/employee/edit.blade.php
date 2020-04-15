@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Edit Employee</h3>
  <br />


  <form method="post" action="{{route('employee.update', $id)}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Employee ID:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="{{$employee->EID}}" disabled/>
   </div>
   <div class="form-group">
    <span>First Name:</span>
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{$employee->FName}}"/>
   </div>
   <div class="form-group">
    <span>Last Name:</span>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{$employee->LName}}"/>
   </div>
   <div class="form-group">
    <span>Date of Birth:</span>
    <input type="text" name="date_of_birth" class="form-control" placeholder="Enter Date of Birth" value="{{$employee->DoB}}"/>
   </div>
   <div class="form-group">
    <span>Gender:</span>
    <select class="form-control" id="gender" name="gender" placeholder="Gender">
        <option value="" disabled>Gender</option>
        @if($employee->Gender == 'M')
            <option value="M" selected>Male</option>
        @else
            <option value="M">Male</option>
        @endif
        @if($employee->Gender == 'F')
            <option value="F" selected>Female</option>
        @else
            <option value="F">Female</option>
        @endif
        @if($employee->Gender == 'O')
            <option value="O" selected>Other</option>
        @else
            <option value="O">Other</option>
        @endif
    </select>
   </div>
   <div class="form-group">
    <span>Phone:</span>
    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{$employee->Phone}}"/>
   </div>
   <div class="form-group">
    <span>Address:</span>
    <input type="text" name="address" class="form-control" placeholder="Enter Address (without ZipCode)" value="{{$employee->Address}}"/>
   </div>
   <div class="form-group">
    <span>ZipCode:</span>
    <select class="form-control" id="zipcode" name="zip_code">
        <option value="" disabled>Zip Code</option>
        @foreach($zips as $row)
            @if($employee->Zip == $row->Zip)
                <option selected value="{{$row->Zip}}">{{$row->Zip}} | {{$row->City}} | {{$row->State}}</option>
            @else
                <option value="{{$row->Zip}}">{{$row->Zip}} | {{$row->City}} | {{$row->State}}</option>
            @endif
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Department:</span>
    <select class="form-control" id="department" name="department">
        <option value="" disabled>Department</option>
        @foreach($depts as $row)
            @if($employee->Department == $row->DID)
                <option selected value="{{$row->DID}}">{{$row->DID}} | {{$row->DeptName}}</option>
            @else
                <option value="{{$row->DID}}">{{$row->DID}} | {{$row->DeptName}}</option>
            @endif    
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Employee Type:</span>
    <select class="form-control" id="empType" name="emptype">
        <option value="" disabled>Employee Type</option>
        @if($employee->Employee_Type == "Receptionist")
            <option value="Receptionist" selected>Receptionist</option>
        @else
            <option value="Receptionist"disabled>Receptionist</option>
        @endif
        @if($employee->Employee_Type == "Physician")
            <option value="Physician" selected>Physician</option>
        @else
            <option value="Physician"disabled>Physician</option>
        @endif
    </select>
   </div>
   @if($employee->Employee_Type == "Physician")
   <h3 align="left">Edit Physician Info</h3>
    <div class="form-group">
        <span>License No:</span>
        <input type="text" name="license_no" class="form-control" placeholder="License Number" value="{{$physician->LicenseNo}}"/>
    </div>
    <div class="form-group">
        <span>Specialty:</span>
        <input type="text" name="specialty" class="form-control" placeholder="Specialty" value="{{$physician->Specialty}}"/>
    </div>
   @endif
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection