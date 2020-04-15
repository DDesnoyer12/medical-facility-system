<?php 

$pa = DB::select(DB::raw("SELECT * FROM Patient"));

?>

@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Welcome! Click a link in the navbar above</h3>
  <br />
  
 </div>
</div>
@endsection
