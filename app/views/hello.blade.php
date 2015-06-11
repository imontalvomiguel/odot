@extends('layouts.master')

@section('content')
    {{ isset($name) ? 'Welcome ' . $name . '.' : 'Welcome.' }}
@stop