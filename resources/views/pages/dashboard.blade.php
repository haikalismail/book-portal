@extends('layout.app')
@section('content')
@include('inc.header')

<?php use App\book_author;
	  use App\book_items;?>
	<!-- banner -->
	<div class="banner">
			<div class="container">
				<h3 style="padding-left: 60px;">Book Portal, <span>Your World</span></h3>
			</div>
	</div>
	<!-- //banner --> 

	@php($count=0)

	<!-- Hot Book User Category -->
	<div class="banner-bottom">
			<div class="container">
				<div class="top-brands">
				<h3>Hot Books</h3></div>
				<div class="col-md-5 wthree_banner_bottom_left">
					<img src="{{('http://1.bp.blogspot.com/-53-Vqn14Hf8/UVEbaggKdtI/AAAAAAAAJr8/dv5p4LibRVk/s1600/most+recommended+ya+reads.jpg')}}" alt=" " class="img-responsive" />
				</div>
				
				@foreach($user as $users)
					@if($count<1)
						<div class="col-md-7 wthree_banner_bottom_right">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs" role="tablist">
									@foreach($user as $genre_tap)<li role="presentation"><a href="#{{$genre_tap->genre_name}}" id="home-tab" role="tab" data-toggle="tab" aria-controls="{{$genre_tap->genre_name}}">
									{{$genre_tap->genre_name}}</a></li>@endforeach
									</ul>
									
									<div id="myTabContent" class="tab-content">
											@foreach($user as $genre_tap1)
											<div role="tabpanel" class="tab-pane fade active in" id="{{$genre_tap1->genre_name}}" aria-labelledby="{{$genre_tap1->genre_name}}">
											
												<div class="agile_ecommerce_tabs">

															<div class="col-md-4 agile_ecommerce_tab_left">
																	
																	@php ($book = book_items::select('*')
																	->join('book_category', 'book_category.book_id', '=', 'book_items.book_id')
																	->join('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
																	->where('book_genre.genre_id',$genre_tap1->genre_id)
																	->get())

																@foreach($book as $book)
																	<div class="hs-wrapper">
																		<img src="{{$book->image_url}}" alt="No ImageS" />
																	</div>
																	<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</a></h5>
																

																<div class="simpleCart_shelfItem">
																		@php($authors = book_author::select('*')
																		->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
																		->where('book_id',$book->book_id)
																		->get())
											
																		<p>
																			@foreach($authors as $author)
																				{{$author->author_fname}} {{$author->author_lname}}
																			@endforeach
																		</i></p>
																</div>
																@endforeach	
															</div>
													<div class="clearfix"> </div>
												</div>
											</div>
											@endforeach
									</div>
								</div>
							</div>
						</div>
						@php($count++)
					@endif
				@endforeach
				<div class="clearfix"> </div>
			</div>
	</div>
	<!-- //Hot Book User Category --> 
	
	@foreach($user as $users)
	<!--User Category -->
	<div class="top-brands">
		<div class="container">
			<h3>{{$users->genre_name}}</h3>
			<div class="agileinfo_new_products_grids">
				<div class="col-md-3 agileinfo_new_products_grid">
						<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
									@php ($book = book_items::select('*')
									->join('book_category', 'book_category.book_id', '=', 'book_items.book_id')
									->join('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
									->where('book_genre.genre_id',$users->genre_id)
									->get())

								@foreach($book as $book)
									<div class="hs-wrapper hs-wrapper1">
										<img src="{{$book->image_url}}" alt="No ImageS" href="/book/{{$book->book_id}}"/>
									</div>
									<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</a></h5>
								@endforeach
								<div class="simpleCart_shelfItem">
										@php($authors = book_author::select('*')
										->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
										->where('book_id',$book->book_id)
										->get())
			
										<p>
											@foreach($authors as $author)
												{{$author->author_fname}} {{$author->author_lname}}
											@endforeach
										</i></p> 
								</div>	
						</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- //User Category -->
	<a class="w3ls-cart" href="bookCategory/{{$users->genre_id}}" role="button"  style="float: right; padding-right:200px;">View More</a>
	@endforeach
	
@include('inc.footer')