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

  <form method="post" action="{{route('patient.insert')}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Patient ID:</span>
    <input type="text" name="patient_id" class="form-control" placeholder="Enter Patient ID" />
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
    <span>Insurance:</span>
    <select class="form-control" id="instype" name="instype">
        <option value="" disabled selected>Insurance Type</option>
        @foreach($instypes as $row)
            <option value="{{$row->IID}}">{{$row->IID}} | {{$row->State}} | {{$row->Provider}} | {{$row->Description}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection