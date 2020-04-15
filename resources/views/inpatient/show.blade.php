@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Inpatient Info</h3>
  <br />


  <form method="post" action="">
   {{csrf_field()}}
   <div class="form-group">
    <span>Inpatient No:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="{{$inpatient->InpatientNo}}" disabled/>
   </div>  
   <div class="form-group">
    <span>Patient ID:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="{{$inpatient->PID}}" disabled/>
   </div>
   <div class="form-group">
    <span>First Name:</span>
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{$patientinfo->FName}}" disabled/>
   </div>
   <div class="form-group">
    <span>Last Name:</span>
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{$patientinfo->LName}}" disabled/>
   </div>
   <div class="form-group">
    <span>Accepted Date:</span>
    <input type="text" name="acceptance_date" class="form-control" placeholder="Enter Last Name" value="{{$inpatient->AcceptanceDate}}" disabled/>
   </div>
   <div class="form-group">
    <span>Discharged Date:</span>
    <input type="text" name="discharged_date" class="form-control" placeholder="Enter Last Name" value="{{$inpatient->DischargeDate}}" disabled/>
   </div>
   <div class="form-group">
    <span>Room:</span>
    <input type="text" name="room" class="form-control" placeholder="Enter Last Name" value="{{$roominfo->RID}}" disabled/>
   </div>
   <div class="form-group">
    <span>Medical Items Required:</span>
    @foreach($iteminfo as $row)
        <input type="text" name="medical_item" class="form-control" placeholder="Enter Last Name" value="{{$row->Name}}: {{$row->Description}}" disabled/>
    @endforeach
   </div>
  </form>
 </div>
</div>
@endsection