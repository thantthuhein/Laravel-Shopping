@extends('layouts.dashboard')

@section('title')
    Dashboard   
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 justify-content-start">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">Total Users</h5>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <div class="clearfix">
                            <h3 class="float-left"> 
                                <i class="fas fa-user"></i>
                            </h3>
                            <h3 class="float-right">
                                {{ count($totalUsers) }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/dashboard/users') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">Total Orders</h5>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <div class="clearfix">
                            <h3 class="float-left"> 
                                <i class="fas fa-shopping-cart"></i>
                            </h3>
                            <h3 class="float-right">
                                {{ count($totalOrders) }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/dashboard/showTotalOrders') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">Total Sales</h5>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <div class="clearfix">
                            <h3 class="float-left">
                                <i class="fas fa-balance-scale"></i>
                            </h3>
                            <h3 class="float-right">
                                $ {{ $totalPrice }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/dashboard/orders') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>            
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">Prepaid Cards</h5>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <div class="clearfix">
                            <h3 class="float-left">
                                <i class="fas fa-money-bill-wave"></i>
                            </h3>
                            <h3 class="float-right">
                                {{ count($totalPrepaidCards) }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/dashboard/getCreditcardsDetails') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>            
            </div>
        </div>
    </div>
@endsection