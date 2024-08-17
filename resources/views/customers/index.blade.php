@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>Customers</h1>
@endsection

@section('content')
    <div id="app">
        <customer-component></customer-component>
    </div>
@endsection

@push('js')
    @vite('resources/js/app.js')
@endpush
