<?php

namespace App\Http\Controllers;

use App\Chargeability;
use App\Fundsource;
use Illuminate\Http\Request;

class ChargeabilitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chargeabilities = Chargeability::get()->all();

        return view ('chargeabilities.index')->with('chargeabilities',$chargeabilities);
    }


    public function create()
    {
        $fundsources = Fundsource::pluck('name','id');

        return view('chargeabilities.create')->with('fundsources',$fundsources);
    }


    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'amount'=>'required',
           'fundsource_id'=>'required',
           'headofoffice'=>'required',
           'position'=>'required'
        ]);

        $chargeability = new Chargeability;

        $chargeability->fill($request->all());

        $chargeability->save();

        return redirect(route('chargeabilities.index'))->with('success','Record created.');


    }


    public function show($id)
    {
        $chargeability = Chargeability::find($id);

        return view('chargeabilities.show',compact('chargeability'));
    }


    public function edit($id)
    {
        $chargeability = Chargeability::find($id);
        $fundsources = Fundsource::pluck('name','id');

        return view ('chargeabilities.edit',compact('chargeability','fundsources'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'fundsource_id'=>'required'
        ]);

        $chargeability = Chargeability::find($id);

        $chargeability->fill($request->all());

        $chargeability->save();

        return redirect(route('chargeabilities.index'))->with('success','Record updated.');
    }


    public function destroy($id)
    {
        //
    }
}
