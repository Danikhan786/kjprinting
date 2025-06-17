@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
        
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CUSTOMIZE ORDER ID NO #{{$customizeOrders->id}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h4>Name</h4>
                    {{$customizeOrders->name}}
                </div>
                <div class="col-md-6 mt-5">
                    <h4>Email</h4>
                    {{$customizeOrders->email}}
                </div>
               
                <div class="col-md-6 mt-5">
                    <h4>Address</h4>
                    {{$customizeOrders->address}}
                </div>
                <div class="col-md-6 mt-5">
                    <h4>Phone</h4>
                    {{$customizeOrders->phone}}
                </div>
                <div class="col-md-6 mt-5">
                    <h4>Subject</h4>
                    {{$customizeOrders->subject}}
                </div>
                <div class="col-md-6 mt-5">
                    <h4>Comment</h4>
                    {{$customizeOrders->comment}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection