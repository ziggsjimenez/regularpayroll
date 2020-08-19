<?php

namespace App\Http\Controllers;

use App\Deductionitem;
use App\Deductionmode;
use App\Deductionmodecategory;
use Illuminate\Http\Request;

class DeductionitemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $deductionitems = Deductionitem::get()->all();



        return view ('deductionitems.index',compact('deductionitems'));

    }

    public function create()
    {
        $deductionmodes = Deductionmode::pluck('name','id');
        $deductionmodecategories = Deductionmodecategory::pluck('name','id');

        return view('deductionitems.create',compact('deductionmodes','deductionmodecategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'deductionmode_id'=>'required',
            'deductionmodecategory_id'=>'required',
            'status'=>'required'
        ]);



        $deductionitem = new Deductionitem;

        $deductionitem->name = $request['name'];
        $deductionitem->deductionmode_id = $request['deductionmode_id'];
        $deductionitem->deductionmodecategory_id = $request['deductionmodecategory_id'];
        $deductionitem->status = $request['status'];
        $deductionitem->save();
        return redirect(route('deductionitems.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $deductionitem= Deductionitem::find($id);
        $deductionmodes = Deductionmode::pluck('name','id');
        $deductionmodecategories = Deductionmodecategory::pluck('name','id');

        return view('deductionitems.edit',compact('deductionitem','deductionmodes','deductionmodecategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'deductionmode_id'=>'required',
            'deductionmodecategory_id'=>'required',
            'status'=>'required'
        ]);

        $deductionitem = Deductionitem::find($id);

        $deductionitem->name = $request['name'];
        $deductionitem->deductionmode_id = $request['deductionmode_id'];
        $deductionitem->deductionmodecategory_id = $request['deductionmodecategory_id'];
        $deductionitem->status = $request['status'];
        $deductionitem->save();

        return redirect(route('deductionitems.index'));
    }

    public function destroy($id)
    {
        //
    }
}
