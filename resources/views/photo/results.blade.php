@extends('layouts.app')

@section('content')

<search-results :response="{{$response}}"></search-results>

@endsection