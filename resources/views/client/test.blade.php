<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }} </title>
</head>

<body>
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <hr class="mg-b-40 message-inner-separator">
                    <div class="row row-sm">
                        <div class="col-lg-6">
                            <div>{!! DNS1D::getBarcodeHTML($outpass_id, 'C128') !!}</div>
                            <p class="h6 mg-t-3 mg-l-70">{{ $outpass_id }}</p>
                        </div>
                        <div class="col-lg-6">

                            <span class="pull-right">
                                <img alt="avatar" src="{{ $image_url}}" style="width: 100px; height: 100px">
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice table-bordered">
                            <thead>
                                <tr>
                                    <th class="">Name</th>
                                    <th class="">Phone</th>
                                    <th class="tx-center">Hostel Name</th>
                                    <th class="tx-right">Floor</th>
                                    <th class="tx-right">Approved By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $name }}</td>
                                    <td class="tx-12">{{ $phone_no }}</td>
                                    <td class="tx-center">{{ $hostel_name }}</td>
                                    <td class="tx-right">{{ $floor_name }} </td>
                                    <td class="tx-right">{{ $action_by }}</td>
                                </tr>
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13">Destination</label>
                                            <p>{{ $destination }}</p>
                                        </div>
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13">Purpose</label>
                                            <p>{{ $purpose }}</p>
                                        </div>
                                    </td>
                                    <td class="tx-right">Start Time</td>
                                    <td class="tx-right" colspan="2">{{ $start_time }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">End Time</td>
                                    <td class="tx-right" colspan="2">{{ $end_time }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right  tx-bold tx-inverse">Total Duration</td>
                                    <td class="tx-right" colspan="2">{{ $duration }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>