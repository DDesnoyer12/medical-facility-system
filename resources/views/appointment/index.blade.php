@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-15">
  <br />
  <h3 align="center">Appointments</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <a href="{{route('appointment.create')}}" class="btn btn-primary">Schedule Appointment +</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Appointment ID</th>
    <th>Physician ID</th>
    <th>Physician Name</th>
    <th>Patient ID</th>
    <th>Patient Name</th>
    <th>Timeslot ID</th>
    <th>Day of Week</th>
    <th>Date</th>
    <th>Time</th>
    <th>Note</th>
   </tr>
   @foreach($appts as $row)
   <tr>
    <td>{{$row->AID}}</td>
    <td>{{$row->EID}}</td>
    <td>{{$row->EFName}} {{$row->ELName}}</td>
    <td>{{$row->PID}}</td>
    <td>{{$row->PFName}} {{$row->PLName}}</td>
    <td>{{$row->TimeslotID}}</td>
    <td>{{$row->Dayofweek}}</td>
    <td>{{$row->Day}}</td>
    <td>{{$row->TimeStart}}</td>
    <td>{{$row->ApptNote}}</td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</div>
@endsection