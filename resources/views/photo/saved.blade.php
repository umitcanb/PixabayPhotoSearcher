@extends('layouts.app')

@section('content')

<saved-photos :photos="{{$photos}}"></saved-photos>

@endsection