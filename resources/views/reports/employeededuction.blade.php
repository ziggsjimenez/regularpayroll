@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Reports - Employee Deduction'])
@endsection

@section('customCss')


@endsection

@section('content')

<h2>Employee Deduciton </h2>

    <form class="form">
        <div class="form-group">
        <input class="form-control" type="text" id="employeename" name="employeename" placeholder="Search employee..."/>
        </div>
    </form>

    <div class="row">
        <div class="col">

        </div>
    </div>



@endsection

@section('customScripts')




@endsection
