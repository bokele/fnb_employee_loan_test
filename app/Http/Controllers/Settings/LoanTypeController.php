<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    public function __construct(Request $request)
    {


        $this->middleware(function ($request, $next) {
            if (!auth()->user()->hasRole('admin')) {
                abort(403);
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Loan Type"
        ];


        return view("settings.loan-type.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Loan Type Create"
        ];



        return view("settings.loan-type.create")->with($data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hashid)
    {
        $data = [
            'title' => "Loan Type Detail",
            "hashid" => $hashid
        ];

        return view("settings.loan-type.show")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($hashid)
    {
        $data = [
            'title' => "Loan Type Edit",
            "hashid" => $hashid
        ];

        return view("settings.loan-type.edit")->with($data);
    }
}
