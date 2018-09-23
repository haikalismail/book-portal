@extends('layout.app')

@section('content')
<h1>Hi</h1>
@if(count($reader)>0)
    @foreach ($reader as $reader)
        <div class='well'>
        <h3>{{$reader->user_fname}}</h3>
        </div>
    @endforeach

    @foreach ($author as $author)
        <div class='well'>
        <h3>{{$author->author_fname}}</h3>
        </div>
    @endforeach

@else
        <p>no post found</p>
@endif
@endsection

<h1>{{$category->genre_name}}</h1>
					@foreach ($category as $category)
						@if($category->genre_id===1)
							<!--<h3>{{$author->author_fname}}<h3>
							<h3>Publish by: {{$publisher->publisher_name}}<h3>-->