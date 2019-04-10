@extends('layouts.dashboard')

@section('title')
    Dashboard   
@endsection

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header top-bar text-light">
                    <h3>Total Users</h3>
                </div>
                <div class="card-body">
                    <div class="clearfix">
                        <h1 class="float-left"> 
                            <i class="fas fa-user"></i>
                        </h1>
                        <h1 class="float-right">
                            {{ count($totalUsers) }}
                        </h1>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/dashboard/users') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header top-bar text-light">
                    <h3>Total Orders</h3>
                </div>
                <div class="card-body">
                    <div class="clearfix">
                        <h1 class="float-left"> 
                            <i class="fas fa-shopping-cart"></i>
                        </h1>
                        <h1 class="float-right">
                            {{ count($totalOrders) }}
                        </h1>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/dashboard/showTotalOrders') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>                
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header top-bar text-light">
                    <h3>Total Amount of Selling</h3>
                </div>
                <div class="card-body">
                    <div class="clearfix">
                        <h1 class="float-left">
                            <i class="fas fa-balance-scale"></i>
                        </h1>
                        <h1 class="float-right">
                            $ {{ $totalPrice }}
                        </h1>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/dashboard/orders') }}">Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>            
        </div>
    </div>
@endsection