@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header border-bottom bg-warning">
                        <h3 class="card-title tx-18"><label class="main-content-label tx-15 tx-white">Today Pending Outpass</label></h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <span class="crypto-icon bg-warning-transparent me-3 my-auto"><i class="fas fa-wallet text-primary"></i></span>
                            <div class="">
                                <h5 class="tx-semibold">{{$todayPendingOutpass}} </h5>
                            </div>
                        </div>
                        <a href="" class="btn btn-warning-transparent btn-sm mg-t-5">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header border-bottom bg-success">
                        <h3 class="card-title tx-18"><label class="main-content-label tx-15 tx-white">Today Accepted Outpass</label></h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <span class="crypto-icon bg-success-transparent me-3 my-auto"><i class="fe fe-arrow-down-left text-success"></i></span>
                            <div class="">
                                <h5 class="tx-semibold">{{$todayAcceptedOutpass}} </h5>
                            </div>
                        </div>
                        <a href="" class="btn btn-success-transparent btn-sm mg-t-5">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card custom-card">
                    <div class="card-header border-bottom bg-danger">
                        <h3 class="card-title tx-18"><label class="main-content-label tx-15 tx-white">Today Rejected Outpass</label></h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <span class="crypto-icon bg-danger-transparent me-3 my-auto">
                                <i class="fe fe-arrow-up-right text-danger"></i>
                            </span>
                            <div class="">
                                <h5 class="tx-semibold">{{$todayRejectedOutpass}} </h5>
                            </div>
                        </div>
                        <a href="" class="btn btn-danger-transparent btn-sm mg-t-5">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <h3 class="card-title tx-18">
                            <label class="main-content-label tx-15">Overall Outpass History</label>
                        </h3>
                    </div>
                    <div class="row row-sm px-4">
                        <div class="col-lg-12 col-xl-4">
                            <div class="card border custom-card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <span class="crypto-icon bg-primary-transparent me-3 my-auto"><i class="fas fa-wallet text-primary"></i></span>
                                        <div class="">
                                            <p class="text-uppercase tx-13 text-muted mb-1">Total Outpass</p>
                                            <h5 class="tx-semibold">{{ $totalOutpass }} </h5>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-primary-transparent btn-sm">Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-4">
                            <div class="card border custom-card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <span class="crypto-icon bg-success-transparent me-3 my-auto"><i class="fe fe-arrow-down-left text-success"></i></span>
                                        <div class="">
                                            <p class="text-uppercase tx-13 text-muted mb-1">Accepted Outpass</p>
                                            <h5 class="tx-semibold">{{ $totalAcceptedOutpass }}</h5>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-success-transparent btn-sm">Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-4">
                            <div class="card border custom-card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <span class="crypto-icon bg-danger-transparent me-3 my-auto">
                                            <i class="fe fe-arrow-up-right text-danger"></i>
                                        </span>
                                        <div class="">
                                            <p class="text-uppercase tx-13 text-muted mb-1">Rejected Outpass</p>
                                            <h5 class="tx-semibold">{{ $totalRejectedOutpass }}</h5>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-danger-transparent btn-sm">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection