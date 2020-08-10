<?php

namespace App\Http\Controllers;

use App\Deductionitem;
use App\Deductionmode;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deductionmodes = Deductionmode::pluck('name','id');

        return view('deductionitems.create',compact('deductionmodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'deductionmode_id'=>'required',
            'defaultamount'=>'required'
        ]);

        if(!isset($request['f1'])) $f1 = 0; else $f1 = $request['f1'];
        if(!isset($request['f2'])) $f2 = 0; else $f2 = $request['f2'];
        if(!isset($request['f3'])) $f3 = 0; else $f3 = $request['f3'];
        if(!isset($request['f4'])) $f4 = 0; else $f4 = $request['f4'];
        if(!isset($request['f5'])) $f5 = 0; else $f5 = $request['f5'];
        if(!isset($request['f6'])) $f6 = 0; else $f6 = $request['f6'];
        if(!isset($request['f7'])) $f7 = 0; else $f7 = $request['f7'];
        if(!isset($request['f8'])) $f8 = 0; else $f8 = $request['f8'];
        if(!isset($request['f9'])) $f9 = 0; else $f9 = $request['f9'];
        if(!isset($request['f10'])) $f10 = 0; else $f10 = $request['f10'];
        if(!isset($request['f11'])) $f11 = 0; else $f11 = $request['f11'];
        if(!isset($request['f12'])) $f12 = 0; else $f12 = $request['f12'];
        if(!isset($request['f13'])) $f13 = 0; else $f13 = $request['f13'];
        if(!isset($request['f14'])) $f14 = 0; else $f14 = $request['f14'];
        if(!isset($request['f15'])) $f15 = 0; else $f15 = $request['f15'];
        if(!isset($request['f16'])) $f16 = 0; else $f16 = $request['f16'];
        if(!isset($request['f17'])) $f17 = 0; else $f17 = $request['f17'];
        if(!isset($request['f18'])) $f18 = 0; else $f18 = $request['f18'];
        if(!isset($request['f19'])) $f19 = 0; else $f19 = $request['f19'];
        if(!isset($request['f20'])) $f20 = 0; else $f20 = $request['f20'];
        if(!isset($request['f21'])) $f21 = 0; else $f21 = $request['f21'];
        if(!isset($request['f22'])) $f22 = 0; else $f22 = $request['f22'];
        if(!isset($request['f23'])) $f23 = 0; else $f23 = $request['f23'];
        if(!isset($request['f24'])) $f24 = 0; else $f24 = $request['f24'];

        $deductionitem = new Deductionitem;

        $deductionitem->name = $request['name'];
        $deductionitem->deductionmode_id = $request['deductionmode_id'];
        $deductionitem->defaultamount = $request['defaultamount'];
        $deductionitem->status = $request['status'];
        $deductionitem->f1 = $f1;
        $deductionitem->f2 = $f2;
        $deductionitem->f3 = $f3;
        $deductionitem->f4 = $f4;
        $deductionitem->f5 = $f5;
        $deductionitem->f6 = $f6;
        $deductionitem->f7 = $f7;
        $deductionitem->f8 = $f8;
        $deductionitem->f9 = $f9;
        $deductionitem->f10 = $f10;
        $deductionitem->f11 = $f11;
        $deductionitem->f12 = $f12;
        $deductionitem->f13 = $f13;
        $deductionitem->f14 = $f14;
        $deductionitem->f15 = $f15;
        $deductionitem->f16 = $f16;
        $deductionitem->f17 = $f17;
        $deductionitem->f18 = $f18;
        $deductionitem->f19 = $f19;
        $deductionitem->f20 = $f20;
        $deductionitem->f21 = $f21;
        $deductionitem->f22 = $f22;
        $deductionitem->f23 = $f23;
        $deductionitem->f24 = $f24;
        $deductionitem->save();
        return redirect(route('deductionitems.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deductionitem= Deductionitem::find($id);
        $deductionmodes = Deductionmode::pluck('name','id');

        return view('deductionitems.edit',compact('deductionitem','deductionmodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'deductionmode_id'=>'required',
            'defaultamount'=>'required'
        ]);

        if(!isset($request['f1'])) $f1 = 0; else $f1 = $request['f1'];
        if(!isset($request['f2'])) $f2 = 0; else $f2 = $request['f2'];
        if(!isset($request['f3'])) $f3 = 0; else $f3 = $request['f3'];
        if(!isset($request['f4'])) $f4 = 0; else $f4 = $request['f4'];
        if(!isset($request['f5'])) $f5 = 0; else $f5 = $request['f5'];
        if(!isset($request['f6'])) $f6 = 0; else $f6 = $request['f6'];
        if(!isset($request['f7'])) $f7 = 0; else $f7 = $request['f7'];
        if(!isset($request['f8'])) $f8 = 0; else $f8 = $request['f8'];
        if(!isset($request['f9'])) $f9 = 0; else $f9 = $request['f9'];
        if(!isset($request['f10'])) $f10 = 0; else $f10 = $request['f10'];
        if(!isset($request['f11'])) $f11 = 0; else $f11 = $request['f11'];
        if(!isset($request['f12'])) $f12 = 0; else $f12 = $request['f12'];
        if(!isset($request['f13'])) $f13 = 0; else $f13 = $request['f13'];
        if(!isset($request['f14'])) $f14 = 0; else $f14 = $request['f14'];
        if(!isset($request['f15'])) $f15 = 0; else $f15 = $request['f15'];
        if(!isset($request['f16'])) $f16 = 0; else $f16 = $request['f16'];
        if(!isset($request['f17'])) $f17 = 0; else $f17 = $request['f17'];
        if(!isset($request['f18'])) $f18 = 0; else $f18 = $request['f18'];
        if(!isset($request['f19'])) $f19 = 0; else $f19 = $request['f19'];
        if(!isset($request['f20'])) $f20 = 0; else $f20 = $request['f20'];
        if(!isset($request['f21'])) $f21 = 0; else $f21 = $request['f21'];
        if(!isset($request['f22'])) $f22 = 0; else $f22 = $request['f22'];
        if(!isset($request['f23'])) $f23 = 0; else $f23 = $request['f23'];
        if(!isset($request['f24'])) $f24 = 0; else $f24 = $request['f24'];

        $deductionitem = Deductionitem::find($id);

        $deductionitem->name = $request['name'];
        $deductionitem->deductionmode_id = $request['deductionmode_id'];
        $deductionitem->defaultamount = $request['defaultamount'];
        $deductionitem->status = $request['status'];
        $deductionitem->f1 = $f1;
        $deductionitem->f2 = $f2;
        $deductionitem->f3 = $f3;
        $deductionitem->f4 = $f4;
        $deductionitem->f5 = $f5;
        $deductionitem->f6 = $f6;
        $deductionitem->f7 = $f7;
        $deductionitem->f8 = $f8;
        $deductionitem->f9 = $f9;
        $deductionitem->f10 = $f10;
        $deductionitem->f11 = $f11;
        $deductionitem->f12 = $f12;
        $deductionitem->f13 = $f13;
        $deductionitem->f14 = $f14;
        $deductionitem->f15 = $f15;
        $deductionitem->f16 = $f16;
        $deductionitem->f17 = $f17;
        $deductionitem->f18 = $f18;
        $deductionitem->f19 = $f19;
        $deductionitem->f20 = $f20;
        $deductionitem->f21 = $f21;
        $deductionitem->f22 = $f22;
        $deductionitem->f23 = $f23;
        $deductionitem->f24 = $f24;
        $deductionitem->save();
        return redirect(route('deductionitems.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
