<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #e7e7e7;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        table thead td {
            text-align: center;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #e7e7e7;
            background-color: #FFFFFF;
            border: 0mm none #e7e7e7;
            border-top: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.cost {
            text-align: "." center;
        }
    </style>
</head>

<body>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
                OUTPASS
            </td>
        </tr>
        <tr>
            <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" style="font-family: sans-serif; height: 120px" cellpadding="10">
        <tr>
            <td width="49%">
                <div>{!! DNS1D::getBarcodeHTML($outpass_id, 'C128') !!}</div>
                <p style="margin-left: 70px;">{{ $outpass_id }}</p>
            </td>
            <td width="2%">&nbsp;</td>
            <td width="49%">
                <img alt="avatar" src="{{ $image_url}}" style="width: 100px; height: 100px; float: right;">
            </td>
        </tr>
    </table>
    <br />
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="20%" style="text-align: left;"><strong>Name</strong></td>
                <td width="20%" style="text-align: left;"><strong>Phone</strong></td>
                <td width="20%" style="text-align: left;"><strong>Hostel Name</strong></td>
                <td width="20%" style="text-align: left;"><strong>Floor</strong></td>
                <td width="20%" style="text-align: left;"><strong>Approved By</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $name }}</td>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $phone_no }}</td>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $hostel_name }}</td>
                <td>{{ $floor_name }}</td>
                <td>{{ $action_by }}</td>
            </tr>
        </tbody>
    </table>
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="20%" style="text-align: left;"><strong>Destination</strong></td>
                <td width="20%" style="text-align: left;"><strong>Purpose</strong></td>
                <td width="20%" style="text-align: left;"><strong>Start Date Time</strong></td>
                <td width="20%" style="text-align: left;"><strong>End Date Time</strong></td>
                <td width="20%" style="text-align: left;"><strong>Duration</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $destination }}</td>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $purpose }}</td>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $start_time }}</td>
                <td>{{ $end_time }}</td>
                <td>{{ $duration }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>