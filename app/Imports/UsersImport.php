<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new student([
                'fname'     => $row[0],
                'lname'    => $row[0],
                'email'    => $row[0], 
                'password' => \Hash::make('123456'),
            ]);
    }
}
