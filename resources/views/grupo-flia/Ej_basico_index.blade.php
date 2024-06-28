@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">
                        <h4><strong>{{ __('Grupos -- Familias') }}</strong></h4>
                    </span>
                    <br>
                </div>
            </div>
        </div>
        <br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <span>{{ $message }}</span>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                <span>{{ $message }}</span>
                </div>
            @endif
        <br>





<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>