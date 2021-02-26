<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    
    function index()
    {
     $data = DB::table('students')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::store($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'First Name'  => $row['fname'],
         'LastNAme'   => $row['lname'],
         'Email'   => $row['email'],
         'Password'    => $row['password'],
         'create_at'  => $row['create_at'],
         'updated_at'   => $row['updated_at']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('students')->insert($insert_data);
      }
     }
     dd('Excel Data Imported successfully.');
    }

}
