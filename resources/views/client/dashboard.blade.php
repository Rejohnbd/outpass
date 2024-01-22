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
                            <p class="mb-0 mt-3 text-muted">Last Approved Pass<span class="float-end">OBH8665</span></p>
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
                            <p class="mb-0 mt-3 text-muted">Last Rejected Pass<span class="float-end">OBH8655</span></p>
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
                            <p class="mb-0 mt-3 text-muted">Pending Pass ID<span class="float-end">OBH8665</span></p>
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
                                        <td>1</td>
                                        <td>OBH8665</td>
                                        <td>Homepass</td>
                                        <td>Yes</td>
                                        <td>Sonipat</td>
                                        <td>18:20, 21 Jan 2024</td>
                                        <td>20:20, 21 Jan 2024</td>
                                        <td>24:20, 21 Jan 2024</td>
                                        <td>05 Days</td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="btn ripple btn-outline-success btn-sm">Approved</button>
                                        </td>
                                        <td><button type="button" class="btn ripple btn-outline-success btn-sm">Click Here</button></td>
                                        <td>24:20, 21 Jan 2024</td>
                                        <td>Ankur Sir</td>
                                        <td>for chill</td>
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

@push('scripts')
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/table-data.js') }}"></script>
@endpush