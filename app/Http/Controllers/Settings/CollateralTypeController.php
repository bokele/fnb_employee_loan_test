<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollateralTypeController extends Controller
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
            'title' => "Collateral Type"
        ];


        return view("settings.collateral-type.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Collateral Type Create"
        ];



        return view("settings.collateral-type.create")->with($data);
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
            'title' => "Collateral Type Detail",
            "hashid" => $hashid
        ];

        return view("settings.collateral-type.show")->with($data);
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
            'title' => "Collateral Type Edit",
            "hashid" => $hashid
        ];

        return view("settings.collateral-type.edit")->with($data);
    }
}
