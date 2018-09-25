@extends('layout.app')

@section('content')
@foreach($items as $items)
<h1>{{$items->author_name}}</h1>
@endforeach

@endsection