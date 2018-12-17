@extends('layout.app')
@section('content')
@include('inc.header')

<?php use App\book_author;
	  use App\book_items;
	  use App\book_genre;
	  use App\user_preference;?>
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

															<div class="col-md-12 agile_ecommerce_tab_left">
																	
																	@php ($book = book_items::select('*')
																	->join('book_category', 'book_category.book_id', '=', 'book_items.book_id')
																	->join('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
																	->where('book_genre.genre_id',$genre_tap1->genre_id)
																	->get())

																@php($count2=0)
																<div class="w3ls_mobiles_grid_right_grid3">
																		@if(count($book) > 0)
																		@foreach($book as $books)
																			@if($count2<3)
																			<div class="col-md-4 agile info_new_products_grid agile info_new_products_grid_mobiles">
																				<div class="agile_ecommerce_tab_left mobiles_grid">
																					<div class="hs-wrapper hs-wrapper2">
																						<img src="{{$books->image_url}}" alt="No Image" class="img-responsive"/>	
																					</div>
																					<h5><a href="/book/{{$books->book_id}}">{{$books->book_title}}</h5>
																						@php($authors = book_author::select('*')
																								->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
																								->where('book_id',$books->book_id)
																								->get())
																							<p>
																							@foreach($authors as $author)
																							{{$author->author_name}}
																							@endforeach
																							</p>
																					<div class="col-md-12">
																						<a class="button button2" href="book/{{$books->book_id}}" role="button">View More</a>
																					</div> 
																				</div>
																				
																			</div>
																			@php($count2++)
																			@endif
																		@endforeach
																		@endif
																		<div class="clearfix"> </div>
																</div>
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
	
	@php($genre = book_genre::select('*')
	->leftjoin('user_preference', 'user_preference.genre_id', '=', 'book_genre.genre_id')
	->get())

	@foreach($genre as $genre)
	<div class="new-products"  style="padding: 0 0">

		@php ($count=0)
		@php ($count1=0)
		@php ($count2=0)
				<div class="container" style="padding-bottom: 20px;">
					<br><br><h3>{{$genre->genre_name}}</h3>	
					<div class="col-md-12 w3ls_mobiles_grid_right">
							<!--TIGA YANG FIRST-->
							<div class="w3ls_mobiles_grid_right_grid3">
									@php($books = DB::table('book_items')
									->leftjoin('book_publisher', 'book_publisher.publisher_id', '=', 'book_items.publisher_id')
									->leftjoin('book_category', 'book_category.book_id', '=', 'book_items.book_id')
									->leftjoin('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
									->get())
								@if(count($books) > 0)
								@foreach($books as $book)
								@if($genre->genre_name === $book->genre_name)
									@if($count2<3)
									<div class="col-md-4 agile info_new_products_grid agile info_new_products_grid_mobiles">
										<div class="agile_ecommerce_tab_left mobiles_grid">
											<div class="hs-wrapper hs-wrapper2">
												<img src="{{$book->image_url}}" alt="No Image" class="img-responsive"/>	
											</div>
											<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</h5>
												@php($authors = book_author::select('*')
														->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
														->where('book_id',$book->book_id)
														->get())
													<p>
													@foreach($authors as $author)
													{{$author->author_name}}
													@endforeach
													</p>
											<div class="col-md-12">
												<a class="button button2" href="book/{{$book->book_id}}" role="button">View More</a>
											</div> 
										</div>
										
									</div>
									@php($count2++)
									@endif
									@endif
								@endforeach
								@endif
								<div class="clearfix"> </div>
							</div>
						</div>
				</div>
				@php($count++)
	
			@if($count1<1)
			<a class="w3ls-cart" href="bookCategory/{{$genre->genre_id}}" role="button"  style="float: right; padding-right:200px;">View More</a>
				@php($count1++)
			@endif
		@endforeach
	</div>
	
@include('inc.footer')