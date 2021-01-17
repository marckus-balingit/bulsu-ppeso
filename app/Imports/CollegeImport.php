<?php

namespace App\Imports;

use App\College;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class CollegeImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new College([
            'name'  =>$row['college'],
            'abbreviation'  =>$row['abbreviation'],
        ]);
    }

    public function onError(Throwable $e)
    {
        
    }
}
