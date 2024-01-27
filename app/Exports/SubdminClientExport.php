<?php

namespace App\Exports;

use App\Models\Outpass;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubdminClientExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Outpass::query()
            ->where('hostel_id', auth()->user()->subadmin->hostel_id)
            ->whereDate('created_at', '>=', $this->fromDate)
            ->whereDate('created_at', '<=', $this->toDate)
            ->get()
            ->map(function ($outpass) {
                if ($outpass->outpass_type == 1) {
                    $outpassType = 'Homepass';
                } else if ($outpass->outpass_type == 2) {

                    $outpassType = 'Emergency';
                } else {
                    $outpassType = 'Outpass';
                }
                if ($outpass->status == 1) {
                    $outpassStatus = "Approved";
                } else if ($outpass->status == 2) {
                    $outpassStatus = "Rejected";
                } else {
                    $outpassStatus = "Pending";
                }

                return [
                    'Pass ID' => $outpass->outpass_id,
                    'Name' => $outpass->user->name,
                    'Phone' => $outpass->user->userDetails->phone_no,
                    'Email' => $outpass->user->email,
                    'Pass Type' => $outpassType,
                    'Hostel Name' => $outpass->user->userDetails->hostel->name . ' (' . $outpass->user->userDetails->hostel->short_code . ')',
                    'Floor' => $outpass->user->userDetails->hostelFloor->floor_name,
                    'Room No' => $outpass->user->userDetails->room_number,
                    'Course' => strtoupper($outpass->user->userDetails->course),
                    'Year' => $outpass->user->userDetails->year . ' Year',
                    'Guardian Name' => $outpass->user->userDetails->guardian_name,
                    'Guardian_ Phone' => $outpass->user->userDetails->guardian_phone_no,
                    'Parent Permission' => $outpass->parent_permission ? 'Yes' : 'No',
                    'Destination' => $outpass->destination,
                    'Purpose' => $outpass->purpose,
                    'Start Date Time' => date('H:i, d M Y', strtotime($outpass->start_date_time)),
                    'End Date Time' => date('H:i, d M Y', strtotime($outpass->end_date_time)),
                    'Approve Status' => $outpassStatus,
                    'Approved By' => isset($outpass->actionBy) ? $outpass->actionBy->name : ''
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Pass ID',
            'Name',
            'Phone',
            'Email',
            'Pass Type',
            'Hostel Name',
            'Floor',
            'Room No',
            'Course',
            'Year',
            'Guardian Name',
            'Guardian_ Phone',
            'Parent Permission',
            'Destination',
            'Purpose',
            'Start Date Time',
            'End Date Time',
            'Approve Status',
            'Approved By'
        ];
    }
}
