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
                                    <h4 class="text-start mb-0 mt-1"><span class="tx-normal float-start">{{ $totalAcceptedOutpass }}</span></h4>
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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <h6 class="main-content-label mb-1">OUTPASS Status</h6>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form action="{{ route('report-admin') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fe fe-calendar lh--9 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" name="from_date" placeholder="Form Date" type="text" required>
                                            </div>
                                            @error('from_date')
                                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fe fe-calendar lh--9 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" name="to_date" placeholder="To Date" type="text" required>
                                            </div>
                                            @error('to_date')
                                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block btn-sm btn-icon-text">
                                                <i class="fe fe-download-cloud bg-white-transparent text-white"></i>
                                                <span>Reports</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th class="">Sr.No</th>
                                        <th class="wd-20p">PASS ID</th>
                                        <th class="wd-20p">Student Name</th>
                                        <th class="wd-20p">Student Phn</th>
                                        <th class="wd-25p">Pass Type</th>
                                        <th class="wd-25p">Hostel</th>
                                        <th class="wd-25p">Room No</th>
                                        <th class="wd-20p">Parent Permission</th>
                                        <th class="wd-15p">Destination</th>
                                        <th class="wd-20p">Created on</th>
                                        <th class="wd-20p">From</th>
                                        <th class="wd-20p">To</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-20p">For</th>
                                        <th class="wd-20p">Checkout</th>
                                        <th class="wd-20p">Checkin</th>
                                        <th class="wd-20p">Purpose by Student:</th>
                                        <th class="wd-20p">Action took by:</th>
                                        <th class="wd-20p">Sure Status</th>
                                        <th class="wd-20p">Parent Talk</th>
                                        <th class="wd-20p">Approval Reason</th>
                                        <th class="wd-20p">Teaching Day</th>
                                        <th class="wd-20p">Additional Info</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allOutpass as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->outpass_id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->userDetails->phone_no }}</td>
                                        <td>
                                            @if($item->outpass_type == 1)
                                            Homepass
                                            @elseif($item->outpass_type == 2)
                                            Emergency
                                            @else
                                            Outpass
                                            @endif
                                        </td>
                                        <td>{{ $item->user->userDetails->hostel->short_code }}</td>
                                        <td>{{ $item->user->userDetails->room_number }}</td>
                                        <td>{{ $item->parent_permission == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->created_at))}}</td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->start_date_time)) }} </td>
                                        <td>{{ date('H:i, d M Y', strtotime($item->end_date_time)) }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <button type="button" class="btn ripple btn-outline-success btn-sm">Approved</button>
                                            @elseif($item->status == 2)
                                            <button type="button" class="btn ripple btn-outline-danger btn-sm">Rejected</button>
                                            @else
                                            <button type="button" class="btn ripple btn-outline-warning btn-sm">Pending</button>
                                            @endif
                                        </td>
                                        <td>{{ $item->duration }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $item->purpose }}</td>
                                        <td>@if(isset($item->actionBy)){{ $item->actionBy->name }} @endif</td>
                                        <td>{{ $item->sure_status == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->parent_talk }}</td>
                                        <td>{{ $item->approval_reason }}</td>
                                        <td>{{ $item->teaching_day }}</td>
                                        <td>{{ $item->additional_info }}</td>
                                        <td>
                                            @if($item->status != 0)
                                            <form action="{{ route('delete-outpass', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn ripple btn-outline-danger btn-sm row-delete">Delete</button>
                                            </form>
                                            @endif
                                        </td>
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

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}" />
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            showOtherMonths: true,
            selectOtherMonths: true
        });
    })
</script>
@endpush