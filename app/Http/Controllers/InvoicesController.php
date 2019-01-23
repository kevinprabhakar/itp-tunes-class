<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoicesController extends Controller
{
    //How to check if URL parameter is set
    //Type Specific
    public function index(Request $request)
    {
        //How to pull data from database
        $query = DB::table('invoices')
        //Join with customers table where invoices.CustomerId = customers.CustomerId
            ->join('customers','invoices.CustomerId','=','customers.CustomerId');

        //Sees if search param is set in request url
        if ($request->query('search')){
            $query->where('FirstName','=',$request->query('search'));
            $query->orWhere('LastName','=',$request->query('search'));
        }

        //How to grab results from query
        $invoices = $query->get();


        //If we have this variable, how do we get it into the view?
        $semester = 'Spring 2019';
        $course = 'ITP 405';

        //Pass an array into the view function
        return view('invoices', [
            'invoices' => $invoices,
            'search' => $request->query('search')
        ]);
    }
}
