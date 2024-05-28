@extends('layouts.master')
@section('css')

@section('title')
show medicine
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> show medicine</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">show</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="{{ asset($path)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">'
                          <h5 class="card-title">{{ $medicine->name }}</h5>
                          <p class="card-text">Combination : {{ $medicine->combination}}</p>
                          <p class="card-text">Alternatives : {{ $medicine->alternatives}}</p>
                          <p class="card-text"><span class="badge bg-success">{{$val}}</span></p>
                          <p class="card-text">Place where : {{ $medicine->place_where}}</p>
                          <p class="card-text">Price : {{ $medicine->price}}</p>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
