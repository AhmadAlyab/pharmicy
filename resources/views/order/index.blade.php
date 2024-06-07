@extends('layouts.master')
@section('css')

@section('title')
Order
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Order</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">List Order</li>
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
                <a href="{{ route('medicine.customer') }}" type="button" class="btn btn-primary ml-5">Add order</a>
                </div>
               <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Proccees</th>
                         </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $order->medicine->name }}</td>
                            <td>{{ $order->status  }}</td>
                            <td>{{ $order->medicine->price }}</td>
                            <td>
                                <a href="#" data-target="#deleteoder{{$order->id}}"
                                    class="btn btn-danger" data-toggle="modal" role="button"
                                    aria-pressed="true" title="delete order"><i class="fa fa-trash"></i></a>
                                <a href="#" data-target="#periodicorder{{$order->id}}"
                                    class="btn btn-success" data-toggle="modal" role="button"
                                    aria-pressed="true" title="periodic order"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @include('order.delete')
                        @include('order.periodicOrder')
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
