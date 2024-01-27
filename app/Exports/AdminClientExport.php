<?php

namespace App\Exports;

use App\Models\Outpass;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class AdminClientExport implements FromCollection, WithHeadings
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
            'Approved By'
        ];
    }

    // public function map($outpass): array
    // {
    //     dd($outpass);
    //     return [
    //         $outpass->outpass_id,
    //         $outpass->user->name,
    //         // optional($outpass->student)->name, // Access the related Student's name
    //         // optional($outpass->student)->phone, // Access the related Student's phone
    //         // optional($outpass->passType)->name, // Access the related PassType's name
    //         // Add other columns as needed
    //     ];
    // }
}
