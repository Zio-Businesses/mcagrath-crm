<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LeadClientImport implements ToModel, WithChunkReading, WithHeadingRow, WithBatchInserts

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'added_by'=> $row['entered_by'],
            'client_name'=> $row['client_name'],
            'company_id'=>1, 
            'poc'=> $row['poc'],
            'position'=> $row['position_designation'],
            'mobile'=>$row['phone_number'],
            'client_email'=>$row['email_address'],
            'state'=>$row['state'],
            'website'=>$row['website'],
            'last_called_date'=>$row['last_called_date'] ? Date::excelToDateTimeObject($row['last_called_date'])->format('Y-m-d'):null,
            'next_follow_up_date'=>$row['next_follow_up_date'] ? Date::excelToDateTimeObject($row['next_follow_up_date'])->format('Y-m-d'):null,
            'status_type'=>$row['status'],
            'created_at' => $row['date_entered'] ? Date::excelToDateTimeObject($row['date_entered'])->format('Y-m-d H:i:s') : null,
            'address'=>$row['company_locationaddress'],
            'comments'=>$row['comments'],
        ]);
    }

    public function batchSize(): int
    {
        return 500;
    }
    public function chunkSize(): int
    {
        return 1000; // Process 1000 rows at a time
    }
}
