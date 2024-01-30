<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>OUTPASS</title>

</head>

<body>
    <div style="width: 100%">
        <table style="margin: 0 auto">
            <tr>
                <td colspan="2">
                    <h4 style="text-align: center;">OUTPASS</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><img alt="avatar" src="{{ $image_url}}" style="width: 100px; height: 100px;"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="margin-top: 10px; align-items: center">
                        <div style="margin-left: 30px;">{!! DNS1D::getBarcodeHTML($outpass_id, 'C128') !!}</div>
                        <p style="margin-top: 5px; margin-bottom: 10px; text-align: center">{{ $outpass_id }}</p>
                    </div>
                </td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td><strong> Name: </strong></td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td><strong>Phone: </strong></td>
                <td>{{ $phone_no }}</td>
            </tr>
            <tr>
                <td><strong>Hostel Name: </strong></td>
                <td>{{ $hostel_name }}</td>
            </tr>
            <tr>
                <td><strong>Floor: </strong></td>
                <td>{{ $floor_name }}</td>
            </tr>
            <tr>
                <td><strong>Approved By: </strong></td>
                <td>{{ $action_by }}</td>
            </tr>
            <tr>
                <td><strong>Destination: </strong></td>
                <td>{{ $destination }}</td>
            </tr>
            <tr>
                <td><strong>Purpose: </strong></td>
                <td>{{ $purpose }}</td>
            </tr>
            <tr>
                <td><strong>Created At: </strong></td>
                <td>{{ $created_time }}</td>
            </tr>
            <tr>
                <td><strong>Start Date Time: </strong></td>
                <td>{{ $start_time }}</td>
            </tr>
            <tr>
                <td><strong>End Date Time: </strong></td>
                <td>{{ $end_time }}</td>
            </tr>
            <tr>
                <td><strong>Duration: </strong></td>
                <td>{{ $duration }}</td>
            </tr>
        </table>
    </div>
</body>

</html>