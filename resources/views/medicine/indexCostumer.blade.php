@extends('layouts.master')
@section('css')

@section('title')
Madicine
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Madicine</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Madicine</li>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                <a href="{{ route('medicine.add') }}" type="button" class="btn btn-primary ml-5">Add madicine</a>
                </div>
               <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Proccees</th>
                         </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($madicines as $madicine)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $madicine->name }}</td>
                            <td>{{ $madicine->name }}</td>
                            <td>
                            @php($val = $madicine->status ? "available" : "not available")
                            {{$val}}
                            </td>
                            <td>
                                <a href="{{ route('order.create',$madicine->id) }}"
                                    title="order medicine" class="btn btn-success">Add order</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Proccess</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
