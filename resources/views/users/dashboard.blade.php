@extends('baselayout')

@section('title') Dashboard @stop

@section('content')
<div class="row">
    <h1>Dashboard</h1>
    <div class="well">
        <p>Welcome <strong> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</strong></p>
    </div>
</div>
@stop