@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">New MedicalItem</h3>
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

  <form method="post" action="{{route('medicalitem.update', $id)}}">
   {{csrf_field()}}
   <div class="form-group">
    <span>Item ID:</span>
    <input type="text" name="item_id" class="form-control" placeholder="Item ID" value="{{$item->ItemID}}" readonly="readonly" />
   </div>
   <div class="form-group">
    <span>Item Name:</span>
    <input type="text" name="item_name" class="form-control" placeholder="Enter Item Name" value="{{$item->Name}}"/>
   </div>
   <div class="form-group">
    <span>Item Description:</span>
    <input type="text" name="description" class="form-control" placeholder="Enter Item Description" value="{{$item->Description}}"/>
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
</form>
</div>
</div>
@endsection
