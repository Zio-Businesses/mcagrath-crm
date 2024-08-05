<?php

namespace App\Imports;

use App\Models\Locations;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class LocationsImport implements ToModel, WithChunkReading, WithHeadingRow, WithBatchInserts

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Log::info($row['state']);
        return new Locations([
            'state'=> $row['state'],
            'county'=> $row['county'],
            'city'=> $row['city'],
            'zip'=> $row['zip'],
            'timezone'=> $row['timezone'],
            'created_at'=> date("Y-m-d"),
            'updated_at'=> date("Y-m-d"),
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
