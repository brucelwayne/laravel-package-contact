@extends('layouts.www',['title'=>'Contact - '.config('app.name')])

@section('content')
    @include('contact::components.contact-form')
@endsection