@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Edit Employee</h3>
  <br />


  <form method="post" action="{{route('patient.update', $id)}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Employee ID:</span>
    <input type="text" name="patient_id" class="form-control" placeholder="Patient ID" value="{{$patient->PID}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>First Name:</span>
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{$patient->FName}}"/>
   </div>
   <div class="form-group">
    <span>Last Name:</span>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{$patient->LName}}"/>
   </div>
   <div class="form-group">
    <span>Date of Birth:</span>
    <input type="text" name="date_of_birth" class="form-control" placeholder="Enter Date of Birth" value="{{$patient->DoB}}"/>
   </div>
   <div class="form-group">
    <span>Gender:</span>
    <select class="form-control" id="gender" name="gender" placeholder="Gender">
        <option value="" disabled>Gender</option>
        @if($patient->Gender == 'M')
            <option value="M" selected>Male</option>
        @else
            <option value="M">Male</option>
        @endif
        @if($patient->Gender == 'F')
            <option value="F" selected>Female</option>
        @else
            <option value="F">Female</option>
        @endif
        @if($patient->Gender == 'O')
            <option value="O" selected>Other</option>
        @else
            <option value="O">Other</option>
        @endif
    </select>
   </div>
   <div class="form-group">
    <span>Phone:</span>
    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{$patient->Phone}}"/>
   </div>
   <div class="form-group">
    <span>Address:</span>
    <input type="text" name="address" class="form-control" placeholder="Enter Address (without ZipCode)" value="{{$patient->Address}}"/>
   </div>
   <div class="form-group">
    <span>ZipCode:</span>
    <select class="form-control" id="zipcode" name="zip_code">
        <option value="" disabled>Zip Code</option>
        @foreach($zips as $row)
            @if($patient->Zip == $row->Zip)
                <option selected value="{{$row->Zip}}">{{$row->Zip}} | {{$row->City}} | {{$row->State}}</option>
            @else
                <option value="{{$row->Zip}}">{{$row->Zip}} | {{$row->City}} | {{$row->State}}</option>
            @endif
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Insurance:</span>
    <select class="form-control" id="insurance" name="instype">
        <option value="" disabled>Insurance</option>
        @foreach($insurance as $row)
            @if($patient->IID == $row->IID)
                <option selected value="{{$row->IID}}">{{$row->IID}} | {{$row->State}} | {{$row->Provider}} | {{$row->Description}}</option>
            @else
                <option value="{{$row->IID}}">{{$row->IID}} | {{$row->State}} | {{$row->Provider}} | {{$row->Description}}</option>
            @endif    
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