@extends('layouts.guest')

@section('title', 'Checkout')

@section('content')
<div class="row signpages text-center">
    <div class="col-md-12">
        <div class="card border-0">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-6 col-xs-6 col-sm-6 login_form rounded-start-11">
                    <div class="container-fluid">
                        <div class="row row-sm">
                            <div class="card-body main-profile-overview mt-3 mb-3">
                                <div class="clearfix"></div>
                                <h2 class="text-start mb-2 text-center">Checkout Screen</h2>
                                <p class="mb-4 text-muted tx-13 ms-0 text-center">Enter Outpass and Submit for Checkout</p>
                                <form action="javascript:void(0);" method="post">
                                    <div class="form-group">
                                        <input class="form-control" id="outpassId" autocomplete="outpass_id" placeholder="Enter Outpass" value="@if(isset($outpass)){{$outpass->outpass_id}}@endif" type="text">
                                    </div>
                                    <button type="submit" id="submitCheckOut" class="btn btn-primary btn-block mt-4 mb-4">SUBMIT OUTPASS</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notFound">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="btn-close float-end" data-bs-dismiss="modal" type="button"></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-danger tx-normal mg-b-20">Error: Otupass Not Found</h4>
                <p class="mg-b-20 mg-x-20">Outpass Not found. Try Again</p>
                <button aria-label="Close" class="btn ripple btn-danger pd-x-25" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alreadyChecked">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="btn-close float-end" data-bs-dismiss="modal" type="button"></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-danger tx-normal mg-b-20">Error: Otupass Already Checked Out</h4>
                <button aria-label="Close" class="btn ripple btn-danger pd-x-25" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="btn-close float-end" data-bs-dismiss="modal" type="button"></button>
                <div class="row">
                    <div class="col-md-6">
                        <i class="icon ion-ios-checkmark-circle-outline tx-100 tx-success lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-success tx-normal mg-b-20">Congratulations!</h4>
                    </div>
                    <div class="col-md-6">
                        <img id="userImage" src="" style="width: 100px; height: 100px;">
                    </div>
                </div>
                <button aria-label="Close" class="btn ripple btn-success pd-x-25" data-bs-dismiss="modal" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@if(isset($outpass_status) && $outpass_status == 'notfound')
<script>
    $(document).ready(function() {
        $("#notFound").modal('show');
        setTimeout(function() {
            $("#notFound").modal('hide');
        }, 5000)
    });
</script>
@endif

<script>
    $(document).ready(function() {
        $('#submitCheckOut').on('click', function(e) {
            e.preventDefault();
            console.log('click')
            let outpassId = $('#outpassId').val();

            $.ajax({
                method: "post",
                url: "{{ route('submit-checkout') }}",
                data: {
                    outpassId: outpassId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 'notfound') {
                        $('#outpassId').val('');
                        $("#notFound").modal('show');
                        setTimeout(function() {
                            $("#notFound").modal('hide');
                        }, 5000)
                    }

                    if (response.status == 'used') {
                        $('#outpassId').val('');
                        $("#alreadyChecked").modal('show');
                        setTimeout(function() {
                            $("#alreadyChecked").modal('hide');
                        }, 5000)
                    }

                    if (response.status == 'success') {
                        $('#outpassId').val('');
                        $("#successModal").modal('show');
                        $('#userImage').attr('src', response.userImage);
                        setTimeout(function() {
                            $("#successModal").modal('hide');
                        }, 5000)
                    }
                }
            });
        })
    })
</script>
@endpush