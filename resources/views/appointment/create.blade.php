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

  <form method="post" action="{{route('appointment.insert')}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Select Patient ID:</span>
    <select class="form-control" name="pid">
        <option value="" disabled selected>Patient ID</option>
        @foreach($patients as $row)
            <option value="{{$row->PID}}">{{$row->PID}} | {{$row->FName}} {{$row->LName}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Select Physician ID:</span>
    <select class="form-control" name="eid">
        <option value="" disabled selected>Physician ID</option>
        @foreach($physicians as $row)
            <option value="{{$row->EID}}">{{$row->EID}} | {{$row->FName}} {{$row->LName}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Select Available Timeslot:</span>
    <select class="form-control" name="tid">
        <option value="" disabled selected>Timeslot</option>
        @foreach($opentimeslots as $row)
            <option value="{{$row->TimeslotID}}">{{$row->TimeslotID}} | {{$row->Dayofweek}} {{$row->TimeStart}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Appointment Note (optional):</span>
    <input type="text" name="note" class="form-control" value="None"/>
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>

@endsection