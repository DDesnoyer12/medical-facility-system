@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Inpatient Info</h3>
  <br />


  <form method="post" action="{{route('inpatient.update', $id)}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Inpatient No:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Inpatient No" value="{{$inpatientinfo->InpatientNo}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>Patient ID:</span>
    <input type="text" name="employee_id" class="form-control" placeholder="Patient ID" value="{{$inpatientinfo->PID}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>First Name:</span>
    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$inpatientinfo->FName}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>Last Name:</span>
    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$inpatientinfo->LName}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>Accepted Date:</span>
    <input type="text" name="acceptance_date" class="form-control" placeholder="Accepted Date" value="{{$inpatientinfo->AcceptanceDate}}" readonly="readonly"/>
   </div>
   <div class="form-group">
    <span>Discharged Date:</span>
    <input type="date" name="discharged_date" class="form-control" placeholder="Discharged Date" value="{{$inpatientinfo->DischargeDate}}" />
   </div>
   <div class="form-group">
    <span>Room:</span>
    <select class="form-control" id="room" name="room">
        <option value="" disabled>Room</option>
        @foreach($rooms as $row)
            @if($inpatientinfo->RID == $row->RID)
                <option selected value="{{$row->RID}}">{{$inpatientinfo->RID}} | {{$inpatientinfo->Department}}</option>
            @else
                <option value="{{$row->RID}}">{{$row->RID}} | {{$row->Department}}</option>
            @endif
        @endforeach
    </select>
   </div>
   <div class="form-group">
    <span>Medical Items Required:</span>
    @foreach($iteminfo as $row)
        <input type="text" name="medical_item" class="form-control" placeholder="Medical Item Info" value="{{$row->Name}}: {{$row->Description}}" readonly="readonly"/>
    @endforeach
   </div>
   <div class="form-group">
    <span>Assign Medical Item:</span>
    <select class="form-control" id="meditem" name="meditem">
        <option value="" disabled>Medical Item</option>
        <option value="none" selected>None</option>
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