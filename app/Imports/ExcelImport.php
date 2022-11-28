<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'lecture_id'    => $row[0], 
            'question_name'    => $row[1],
            'option_1'    => $row[2],  
            'option_2'    => $row[3], 
            'option_3'    => $row[4], 
            'option_4'    => $row[5], 
            'answer'    => $row[6], 
            'question_desc'    => $row[7],
        ]);
    }
}
