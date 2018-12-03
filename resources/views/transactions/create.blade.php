@extends('users.partials._layout')
@section('dashboard-title','Add Transaction')
@section('dashboard-body')
    <div id="ts">
        @include('transactions.form')
    </div>
@endsection