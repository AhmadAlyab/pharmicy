@extends('layouts.master')
@section('css')

@section('title')
    Add medicine
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Add medicine</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">client</li>
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
                <!-- Start Form Add -->
                <form action="{{ route('medicine.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Name</label>
                            <input id="Name" type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="available" class="mr-sm-2">Available</label>
                            <select name="available" id="available" class="custom-select my-1 mr-sm-2" required>
                                <option value=true>available</option>
                                <option value=false>not available</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="place_where" class="mr-sm-2">Place Where</label>
                            <input id="place_where" type="text" name="place_where" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="price" class="mr-sm-2">Price</label>
                            <input id="price" type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row mt-1">
                        <div class="col">
                            <label for="alternatives" class="mr-sm-2">Alternatives</label>
                            <input id="alternatives" type="text" name="alternatives" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <label for="combination" class="mr-sm-2">Combination</label>
                            <textarea id="combination" name="combination" id="combination" cols="30" rows="3"
                            class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit" class="btn btn-success" value="submit" />
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
