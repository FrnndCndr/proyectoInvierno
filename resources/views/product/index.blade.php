@extends('layouts.app')

@section('content')
    <h3>
        {{auth()->user()->name}}
    </h3>
@endsection
