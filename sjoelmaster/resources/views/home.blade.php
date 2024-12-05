<!DOCTYPE html>
<html>
<head>
@include('components.header')
@extends('layout')
@section('title','home')
@section('content')
<h1>Welkom op de Homepagina</h1>

@endsection
@section('content')
<h1>Welkom op de Homepagina</h1>
<ul>
    @foreach ($items as $item )
    <li>{{$item}}</li>
    
    @endforeach
</ul>

@endsection
@if(count($items) > 0)
     <ul>
       @foreach($items as $item)
           <li>{{ $item }}</li>
       @endforeach
     </ul>
@else
     <p>Geen items gevonden.</p>
@endif
    <title>Home</title>
</head>
<body>
    <h1>Welkom op de Homepagina</h1>
    
</body>
</html>