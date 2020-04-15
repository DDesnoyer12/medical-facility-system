@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Inpatient Info</h3>
  <br />


  <form method="post" action="{{route('inpatient.insert')}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Inpatient No:</span>
    <input type="text" name="inpatient_no" class="form-control" placeholder="Inpatient No" value="{{$next_no->num}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>Select Patient ID:</span>
    <select class="form-control" id="pid" name="pid">
        <option value="" disabled selected>Patient</option>
        @foreach($patients as $row)
            <option value="{{$row->PID}}">{{$row->PID}} | {{$row->FName}} {{$row->LName}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
    <span>Accepted Date (Now):</span>
    <input type="text" name="acceptance_date" class="form-control" placeholder="Acceptance Date" value="{{NOW()}}" readonly="readonly"/>
   </div>
   
   <div class="form-group">
    <span>Discharged Date (optional):</span>
    <input type="date" name="discharged_date" class="form-control" placeholder="Discharged Date"/>
   </div>
   <div class="form-group">
    <span>Room (optional):</span>
    <select class="form-control" id="room" name="room">
        <option value="" disabled selected>None</option>
        @foreach($rooms as $row)
            <option value="{{$row->RID}}">{{$row->RID}} | {{$row->Department}}</option>
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Assign Medical Item (optional):</span>
    <select class="form-control" id="meditem" name="meditem">
        <option value="" disabled>Medical Item</option>
        <option value="" selected>None</option>
        @foreach($medicalitems as $row)
            <option value="{{$row->ItemID}}">{{$row->ItemID}} | {{$row->Name}} | {{$row->Description}}</option>
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