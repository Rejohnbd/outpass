@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Outpass Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;">Outpass Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                        <i class="fe fe-settings"></i>
                        <span>Hostel: {{ Auth::user()->userDetails->hostel->short_code }}</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="card-order">
                            <label class="main-content-label mb-1 pt-1">Total Outpass</label>
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-start mb-0 mt-1"><span class="tx-normal float-start">{{ $totalOutpass }}</span></h4>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="icon-size mdi mdi-poll-box text-primary bg-primary-transparent"></i>
                                </div>
                            </div>
                            <p class="mb-0 mt-3 text-muted">Registered Since<span class="float-end">{{ date('d F Y', strtotime(Auth::user()->created_at)) }}</span></p>
                        </div>
                        <div class="progress ht-5 mt-1 ">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar progress-bar-xs ht-5 wd-100p bg-primary" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="card-order">
                            <label class="main-content-label mb-1 pt-1">Approved Pass</label>
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-start mb-0 mt-1"><span class="tx-normal float-start">{{ $totalApprovetOutpass }}</span></h4>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="mdi mdi-cube icon-size text-success bg-success-transparent"></i>
                                </div>
                            </div>
                            <p class="mb-0 mt-3 text-muted">Last Approved Pass<span class="float-end">{{ $lastApprovetOutpass }}</span></p>
                        </div>
                        <div class="progress ht-5 mt-1 ">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar progress-bar-xs ht-5 wd-100p bg-success" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="card-order">
                            <label class="main-content-label mb-1 pt-1">Rejected Pass</label>
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-start mb-0 mt-1"><span class="tx-normal float-start">{{ $totalRejectedOutpass }}</span></h4>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="mdi mdi-account-multiple icon-size  text-warning bg-warning-transparent"></i>
                                </div>
                            </div>
                            <p class="mb-0 mt-3 text-muted">Last Rejected Pass<span class="float-end">{{ $lastRejectedOutpass }}</span></p>
                        </div>
                        <div class="progress ht-5 mt-1 ">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar progress-bar-xs ht-5 wd-100p bg-warning" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="card-order">
                            <label class="main-content-label mb-1 pt-1">Pending Pass</label>
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-start mb-0 mt-1"><span class="tx-normal float-start">{{ $totalPendingOutpass }}</span></h4>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="mdi mdi-cart icon-size text-info bg-info-transparent"></i>
                                </div>
                            </div>
                            <p class="mb-0 mt-3 text-muted">Pending Pass ID<span class="float-end">{{ $lastPendingOutpass }}</span></p>
                        </div>
                        <div class="progress ht-5 mt-1 ">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" class="progress-bar progress-bar-xs ht-5 wd-100p bg-info" role="progressbar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header d-flex">
                        <div>
                            <h6 class="main-content-label mb-1">OUTPASS Status</h6>
                        </div>
                        <div class="ms-auto float-end">
                            <a href="{{ route('request-pass') }} " class="btn btn-sm ripple btn-primary"><i class="fe fe-plus me-1"></i> New Pass</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th class="">Sr.No</th>
                                        <th class="wd-20p">PASS ID</th>
                                        <th class="wd-25p">Pass Type</th>
                                        <th class="wd-20p">Parent Permission</th>
                                        <th class="wd-15p">Destination</th>
                                        <th class="wd-20p">Created on</th>
                                        <th class="wd-20p">From</th>
                                        <th class="wd-20p">To</th>
                                        <th class="wd-20p">For</th>
                                        <th class="wd-20p">Checkout</th>
                                        <th class="wd-20p">Checkin</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-20p">Download</th>
                                        <th class="wd-20p">Admin took action On:</th>
                                        <th class="wd-20p">Action took by:</th>
                                        <th class="wd-20p">Purpose by Student:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->outpass_id }}</td>
                                        <td>
                                            @if($item->outpass_type == 1)
                                            Homepass
                                            @elseif($item->outpass_type == 2)
                                            Emergency
                                            @else
                                            Outpass
                                            @endif
                                        </td>
                                        <td>{{ $item->parent_permission == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->created_at))}}</td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->start_date_time)) }} </td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->start_date_time)) }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            @if($item->status == 1)
                                            <button type="button" class="btn ripple btn-outline-success btn-sm">Approved</button>
                                            @elseif($item->status == 2)
                                            <button type="button" class="btn ripple btn-outline-danger btn-sm">Rejected</button>
                                            @else
                                            <button type="button" class="btn ripple btn-outline-warning btn-sm">Pending</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 1)
                                            <button type="button" class="btn ripple btn-outline-success btn-sm">Click Here</button>
                                            @endif
                                        </td>
                                        <td>@if(!is_null($item->approval_date_time)){{ date('H:i, d M Y', strtotime($item->approval_date_time)) }} @endif</td>
                                        <td>@if(isset($item->actionBy)){{ $item->actionBy->name }} @endif</td>
                                        <td>{{ $item->purpose }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection