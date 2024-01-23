@extends('layouts.app')

@section('title', 'Incharge List')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Incharge Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Incharge</li>
                </ol>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h6 class="main-content-label mb-1">Incharge List</h6>
                        </div>
                        <div class="ms-auto float-end">
                            <a href="{{ route('incharges.create') }} " class="btn btn-sm ripple btn-primary"><i class="fe fe-plus me-1"></i> New Incharge</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                <thead>
                                    <tr>
                                        <th class="">Sr.No</th>
                                        <th class="wd-20p">Name</th>
                                        <th class="wd-20p">Email</th>
                                        <th class="wd-20p">Hostel Name</th>
                                        <th class="wd-20p">Floor Name</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->incharge->hostel->name }} ({{$item->incharge->hostel->short_code}})</td>
                                        <td>{{ $item->incharge->hostelFloor->floor_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('incharges.edit', $item->id) }}" class="btn btn-sm ripple btn-primary mg-r-3">Edit</a>
                                                <form action="{{ route('incharges.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm ripple btn-danger row-delete">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <ul class="pagination d-flex justify-content-center">
                            {{ $data->render() }}
                        </ul>
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
@endpush