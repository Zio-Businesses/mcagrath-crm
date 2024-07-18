<?php

namespace App\Imports;

use App\Models\ProjectSubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class SubCategoriesImport implements ToModel, WithHeadingRow

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new ProjectSubCategory([
            'sub_category'=> $row['sub_category'],
            'created_at'    => date("Y-m-d"),
            'updated_at'    => date("Y-m-d"),
        ]);
    }
}
