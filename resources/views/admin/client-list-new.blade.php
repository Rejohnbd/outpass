@extends('layouts.app')

@section('title', 'Client List')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">New Client List</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Client List</li>
                </ol>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="main-content-label mb-1">New Client List</h6>
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
                                        <th class="wd-20p">Action</th>
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
                                        <td>{{ $user->userDetails->course->name }}</td>
                                        <td>{{ $user->userDetails->year }} Year</td>
                                        <td>{{ $user->userDetails->address }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary  showImage" data-id="{{ $user->userDetails->getAvaterUrl($user->userDetails->picture) }}">Show Image</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin-client-approve') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="btn btn-sm btn-outline-primary">Approve</button>
                                            </form>
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