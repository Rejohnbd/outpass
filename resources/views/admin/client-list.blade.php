@extends('layouts.app')

@section('title', 'Client List')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Client List</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Client List</li>
                </ol>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="main-content-label mb-1">OUTPASS Status</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th class="">Sr.No</th>
                                        <th class="wd-20p">Name</th>
                                        <th class="wd-20p">Email</th>
                                        <th class="wd-20p">Roll No</th>
                                        <th class="wd-20p">Phone No</th>
                                        <th class="wd-20p">Guardian Name</th>
                                        <th class="wd-20p">Guardian Phone</th>
                                        <th class="wd-20p">Hostel</th>
                                        <th class="wd-20p">Floor</th>
                                        <th class="wd-20p">Room No</th>
                                        <th class="wd-20p">Course</th>
                                        <th class="wd-20p">Year</th>
                                        <th class="wd-20p">Address</th>
                                        <th class="wd-20p">Picture</th>
                                        <th class="wd-20p">Total Outpass</th>
                                        <th class="wd-20p">Pending Outpass</th>
                                        <th class="wd-20p">Accepted Outpass</th>
                                        <th class="wd-20p">Rejected Outpass</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userList as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->userDetails->roll_no }}</td>
                                        <td>{{ $user->userDetails->phone_no }}</td>
                                        <td>{{ $user->userDetails->guardian_name }}</td>
                                        <td>{{ $user->userDetails->guardian_phone_no }}</td>
                                        <td>{{ $user->userDetails->hostel->name }} ({{$user->userDetails->hostel->short_code}})</td>
                                        <td>{{ $user->userDetails->hostelFloor->floor_name }}</td>
                                        <td>{{ $user->userDetails->room_number }}</td>
                                        <td>{{ strtoupper($user->userDetails->course) }}</td>
                                        <td>{{ $user->userDetails->year }} Year</td>
                                        <td>{{ $user->userDetails->address }}</td>
                                        <td>
                                            <div class="avatar avatar-xl showImage" style="cursor: pointer; " data-id="{{ $user->userDetails->getAvaterUrl($user->userDetails->picture) }}">
                                                <img class="rounded-7" src="{{ $user->userDetails->getAvaterUrl($user->userDetails->picture) }}" alt="img">
                                            </div>
                                        </td>
                                        <td>{{ $user->total_count }}</td>
                                        <td>{{ $user->pending }}</td>
                                        <td>{{ $user->approved }}</td>
                                        <td>{{ $user->rejected }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="main-content-label mb-1">Hostel List</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Floors & Num of Clients</th>
                                        <th>Total Outpass</th>
                                        <th>Pending Outpass</th>
                                        <th>Accepted Outpass</th>
                                        <th>Rejected Outpass</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hostelList as $hostel)
                                    <tr>
                                        <td>{{ $hostel->name }} ({{ $hostel->short_code }})</td>
                                        <td>
                                            <ul class="list-group">
                                                @foreach($hostel->floors as $floor)
                                                <li class="listunorder1">{{ $floor->floor_name }} <span class="badge bg-primary rounded-pill pull-right">{{ $floor->users->count() }}</span></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $hostel->total_count }}</td>
                                        <td>{{ $hostel->pending }}</td>
                                        <td>{{ $hostel->approved }}</td>
                                        <td>{{ $hostel->rejected }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modaldemo4">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <button aria-label="Close" class="btn-close float-end text-danger" data-bs-dismiss="modal" type="button"></button>
                        <br />
                        <img id="modalImage" src="" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
{{-- <script src="{{ asset('assets/plugins/SmartPhoto-master/smartphoto.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $(document).on('click', '.showImage', function() {
            $imagePath = $(this).attr('data-id');
            $('#modalImage').attr('src', $imagePath);
            $('#modaldemo4').modal('show');
        })
        // document.addEventListener('DOMContentLoaded', function() {
        //     new SmartPhoto(".js-img-viewer", {
        //         resizeStyle: 'fit',
        //     });
        // });
    })
</script>
@endpush