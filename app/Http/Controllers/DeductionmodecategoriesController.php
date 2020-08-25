<?php

namespace App\Http\Controllers;

use App\Deductionmodecategory;
use Illuminate\Http\Request;

class DeductionmodecategoriesController extends Controller
{
    public function index(){

        $dedcats = Deductionmodecategory::get()->all();

        return view('deductioncategories.index',compact('dedcats'));
    }

    public function show($id){

        $category = Deductionmodecategory::find($id);

        return view ('deductioncategories.show',compact('category'));
    }
}
