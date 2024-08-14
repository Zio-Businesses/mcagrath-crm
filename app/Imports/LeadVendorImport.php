<?php

namespace App\Imports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LeadVendorImport implements ToModel, WithChunkReading, WithHeadingRow, WithBatchInserts

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vendor([
            'created_by'=> $row['created_by'],
            'state'=> $row['state'],
            'county'=> $row['county'],
            'city'=> $row['city'],
            'contractor_type'=>$row['contractor_type'],
            'v_status'=>$row['v_status'],
            'vendor_name'=>$row['vendor_name'],
            'vendor_email'=>$row['vendor_email'],
            'vendor_number'=>$row['vendor_number'],
            'poc'=>$row['poc'],
            'website'=>$row['website'],
            'nxt_date'=>Date::excelToDateTimeObject($row['nxt_date'])->format('Y-m-d'),
            'notes'=>$row['notes'],
            'notes_title'=>$row['notes_title'],
            'lead_source'=>$row['lead_source'],
            'created_at' => Date::excelToDateTimeObject($row['created_at'])->format('Y-m-d H:i:s'),
            'updated_at' => Date::excelToDateTimeObject($row['updated_at'])->format('Y-m-d H:i:s'),
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
