@extends('layouts.app')

@section('content')

<div class="container">
    <div class="field">
        <h5> Name</h5>
        <p>{{$kata->name}}</p>
        <h5> Description</h5>
        <p>{{$kata->description}} </p>
        <h5> Level</h5>
        <p>{{$kata->level}} </p>
        <h5>Source</h5>
        <p>{{$kata->source}} </p>
    </div>
</div>

@endsection
