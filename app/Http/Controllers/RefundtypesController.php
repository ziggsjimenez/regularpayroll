<?php

namespace App\Http\Controllers;

use App\Refundtype;
use Illuminate\Http\Request;

class RefundtypesController extends Controller
{
    public function index(){

        $refundtypes = Refundtype::get()->all();

        return view ('refundtypes.index',compact('refundtypes'));
    }


    public function create(){

        return view ('refundtypes.create');
    }

    public function edit($id){


        $refundtype = Refundtype::find($id);

        return view ('refundtypes.edit',compact('refundtype'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);

        $refundtype = new Refundtype;

        $refundtype->fill($request->all());

        $refundtype->save();

        return redirect(route('refundtypes.index'))->with('success','Record created');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);

        $refundtype = Refundtype::find($id);

        $refundtype->fill($request->all());

        $refundtype->save();

        return redirect(route('refundtypes.index'))->with('success','Record updated');
    }
}
