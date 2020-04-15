@extends('master')

@section('content')
<div class="row">
 <div class="col-lg-12">
  <br />
  <h3 align="center">Inpatient Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <a href="{{route('inpatient.create')}}" class="btn btn-primary">Register Inpatient +</a>
   <br />
   <br />
   <h5>Sort by:</h5>
   <input type="radio" name="sort" value="all" id="all" checked>
   <label for="current">All Inpatient History</label>
   <input type="radio" name="sort" value="current" id="current">
   <label for="current">Current Inpatients</label>
   <input type="radio" name="sort" value="discharged" id="discharged">
   <label for="current">Discharged Inpatients</label>
  </div>
  <table class="table table-bordered table-striped all">
   <tr>
    <th>Inpatient Number</th>
    <th>PID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date Accepted</th>
    <th>Date Discharged</th>
    <th>View</th>
   </tr>
   @foreach($inpatients as $row)
   <tr>
    <td>{{$row->InpatientNo}}</td>
    <td>{{$row->PID}}</td>
    <td>{{$row->FName}}</td>
    <td>{{$row->LName}}</td>
    <td>{{$row->AcceptanceDate}}</td>
    @if($row->DischargeDate == NULL)
        <td>Not Discharged Yet</td>
    @else
        <td>{{$row->DischargeDate}}</td>
    @endif
    <td>
        <a href="{{route('inpatient.show', $row->InpatientNo)}}" class="btn btn-primary">View</a>
    </td>

   @endforeach
  </table>
  <table style="display: none;" class="table table-bordered table-striped current">
   <tr>
    <th>Inpatient Number</th>
    <th>PID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date Accepted</th>
    <th>Date Discharged</th>
    <th>View</th>
    <th>Edit</th>
   </tr>
   @foreach($inpatients as $row)
   @if($row->DischargeDate == NULL)
    <tr>
        <td>{{$row->InpatientNo}}</td>
        <td>{{$row->PID}}</td>
        <td>{{$row->FName}}</td>
        <td>{{$row->LName}}</td>
        <td>{{$row->AcceptanceDate}}</td>
        <td>Not Discharged Yet</td>
        <td>
            <a href="{{route('inpatient.show', $row->InpatientNo)}}" class="btn btn-primary">View</a>
        </td>
        <td>
            <a href="{{route('inpatient.edit', $row->InpatientNo)}}" class="btn btn-warning" value="EDIT">Edit</a>
        </td>
    </tr>
    @endif
   @endforeach
  </table>
  <table style="display: none;" class="table table-bordered table-striped discharged">
   <tr>
    <th>Inpatient Number</th>
    <th>PID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date Accepted</th>
    <th>Date Discharged</th>
    <th>View</th>
   </tr>
   @foreach($inpatients as $row)
    @if($row->DischargeDate != NULL)
    <tr>
        <td>{{$row->InpatientNo}}</td>
        <td>{{$row->PID}}</td>
        <td>{{$row->FName}}</td>
        <td>{{$row->LName}}</td>
        <td>{{$row->AcceptanceDate}}</td>
        <td>{{$row->DischargeDate}}</td>
        <td>
            <a href="{{route('inpatient.show', $row->InpatientNo)}}" class="btn btn-primary">View</a>
        </td>
    </tr>
    @endif
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function() {
    $('input[type=radio][name=sort]').change(function() {
        if(this.value == "all") {
            $(".all").show();
            $(".current").hide();
            $(".discharged").hide();
        }
        if(this.value == "current") {
            $(".all").hide();
            $(".current").show();
            $(".discharged").hide();
        }
        if(this.value == "discharged") {
            $(".all").hide();
            $(".current").hide();
            $(".discharged").show();
        }
    })
})
</script>
@endsection