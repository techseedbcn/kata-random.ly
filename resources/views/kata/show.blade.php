@extends('layouts.app')

@section('content')

<div class="show-more container">
    <h3>{{$kata->name}}</h3><br>
    <div class="field">
        <h5> Description</h5>
        <p>{{$kata->description}} </p>
        <h5> Level</h5>
        <p>{{$kata->level}} </p>
        <h5>Source</h5>
        <p>{{$kata->source}} </p>
    </div>
</div>

@endsection
