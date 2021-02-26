<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use PDF;
// use App\Http\Controllers\DB;

class pdf extends Controller
{

    //simple pdf code
    function gen()
    {

        $pdf=App::make('dompdf.wrapper');
        $data="<h1 style='color:red'>Hello Small Pdf</h1><h2>Header2</h2>";
        $pdf->loadHTML($data);
        return $pdf->stream();
    }

    //database download pdf 
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('students')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">fname</th>
    <th style="border: 1px solid; padding:12px;" width="30%">lname</th>
    <th style="border: 1px solid; padding:12px;" width="15%">email</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Password Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Created_at</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->fname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->lname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->password.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->created_at.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
