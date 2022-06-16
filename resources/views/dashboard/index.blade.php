@extends('layouts.dashboard')

@section('content')

<h1>Bienvenido <b>{{Auth()->user()->name}}</b>!</h1>

@endsection