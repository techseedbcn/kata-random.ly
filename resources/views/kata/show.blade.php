@extends('layouts.app')

@section('content')

<div class="container">
    <div class="field">
        <h5>Kata</h5>
        <p>{{$kata->name}}</p>
        <h5> Description</h5>
        <p>{{$kata->description}} </p>
        <h5> Level</h5>
        <p>{{$kata->level}} </p>
        <h5>Source</h5>
        <p>{{$kata->source}} </p>
        <a href="/katas/" class="btn btn-info float-right">Go back</a>
    </div>
</div>

@endsection
