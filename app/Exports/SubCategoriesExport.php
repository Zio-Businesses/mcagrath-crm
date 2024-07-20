<?php

namespace App\Exports;

use App\Models\ProjectSubCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SubCategoriesExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProjectSubCategory::select('sub_category')->get();
    }

    /**
     * Define the headings for the export.
     *
     * @return array
     */
    
    public function headings(): array
    {
        return [
           'sub_category',
        ];
    }

}
