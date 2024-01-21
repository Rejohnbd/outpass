@extends('layouts.app')

@section('title', 'All Outpass')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Outpass</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Outpass</li>
                </ol>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="main-content-label mb-1">All Outpass</h6>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table border text-nowrap text-md-nowrap table-striped mg-b-0">
                                <thead>
                                    <tr>
                                        <th>Outpass No</th>
                                        <th>Outpass Type</th>
                                        <th>Parent Permission</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Duration</th>
                                        <th>Approval Status</th>
                                        <th>Actition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->outpass_id }}</th>
                                        <td>
                                            @if($item->outpass_type)
                                            <div class="transaction-img rounded-50 border-info bg-info-transparent text-info">
                                                <span class="avatar-1">HP</span>
                                            </div>
                                            @else
                                            <div class="transaction-img rounded-50 border-secondary bg-secondary-transparent text-secondary">
                                                <span class="avatar-1">OP</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->parent_permission)
                                            <span class="badge bg-success">Yes</span>
                                            @else
                                            <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d-M-Y hh:ii', strtotime($item->start_date_time)) }}</td>
                                        <td>{{ date('d-M-Y hh:ii', strtotime($item->end_date_time)) }}</td>
                                        <td></td>
                                        <td>
                                            @if($item->status == 0)
                                            <span class="badge rounded-pill bg-warning px-2">Pending</span>
                                            @elseif($item->status == 1)
                                            <span class="badge rounded-pill bg-success px-2">Approved</span>
                                            @else
                                            <span class="badge rounded-pill bg-danger px-2">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 0)
                                            <div class="d-flex">
                                                <button class="btn ripple btn-secondary btnPurpose mg-r-3" data-purpose="{{ $item->purpose }}"><i class="fe fe-plus"></i></button>
                                                <a href="{{ route('outpass.edit', $item->id) }}" class="btn ripple btn-primary mg-r-3"><i class="fe fe-edit"></i></a>
                                                <form action="{{ route('outpass.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn ripple btn-danger row-delete"><i class="fe fe-trash"></i></button>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row" colspan="6">Not Found</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <ul class="pagination">
                            {{ $data->render() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="outpassPurpose">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Outpass Purpose</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <p id="modalPurpose"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
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
<script>
    $(document).ready(function() {
        $('.btnPurpose').on('click', function() {
            let purpose = $(this).attr('data-purpose');
            console.log(purpose);
            $('#modalPurpose').text(purpose);
            // $('#outpassPurpose').show();
        });
    });
</script>
@endpush