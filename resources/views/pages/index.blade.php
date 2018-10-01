@extends('layout.app')
@section('content')
@include('inc.header')

<?php use App\book_author;?>
	
	<!-- banner -->
	<div class="banner">
			<div class="container">
				<h3 style="padding-left: 60px;">Book Portal, <span>Your World</span></h3>
			</div>
	</div>
	<!-- //banner --> 

	<!--Drama-->
	<div class="top-brands">
		@php ($count=0)
		@php ($count1=0)
		@foreach($books as $f_loop)
			@if($count<1)
				<div class="container">
					<h3>Drama</h3>	
						<div class="agileinfo_new_products_grids">
							
							@foreach($books as $book)
									@if($book->genre_name==='Drama'||$book->genre_name==='drama')
										<div class="col-md-3 agileinfo_new_products_grid">
											<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
												
														<div class="hs-wrapper hs-wrapper1">
															<img src="{{$book->image_url}}" alt="no images" class="img-responsive" />
															<div class="w3_hs_bottom w3_hs_bottom_sub">
																<ul>
																	<li>
																		<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
																	</li>
																</ul>
															</div>
														</div>
														<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</a></h5>
																						
														<div class="simpleCart_shelfItem">			
															<p>by <i class="item_price">
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
									@endif
							@endforeach
							
							<div class="clearfix"> </div>
						</div>	
				</div>
				@php($count++)
			@endif
	
			@if($count1<1)
				<a class="w3ls-cart" href="bookCategory/2" role="button"  style="float: right; padding-right:200px;">View More</a>
				@php($count1++)
			@endif
		@endforeach
	</div>
	<!--//drama--> 
	
	<!-- Thriller -->
	<div class="new-products">
		@php ($count=0)
		@php ($count1=0)
		@foreach($books as $f_loop)
			@if($count<1)
				<div class="container">
					<h3>Thriller</h3>	
						<div class="agileinfo_new_products_grids">
							
							@foreach($books as $book)
									@if($book->genre_name==='Thriller'||$book->genre_name==='thriller')
										<div class="col-md-3 agileinfo_new_products_grid">
											<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
												
														<div class="hs-wrapper hs-wrapper1">
															<img src="{{$book->image_url}}" alt="no images" class="img-responsive" />
															<div class="w3_hs_bottom w3_hs_bottom_sub">
																<ul>
																	<li>
																		<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
																	</li>
																</ul>
															</div>
														</div>
														<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</a></h5>
																						
														<div class="simpleCart_shelfItem">			
															<p>by <i class="item_price">
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
									@endif
							@endforeach
							
							<div class="clearfix"> </div>
						</div>	
				</div>
				@php($count++)
			@endif
	
			@if($count1<1)
				<a class="w3ls-cart" href="bookCategory/1" role="button"  style="float: right; padding-right:200px;">View More</a>
				@php($count1++)
			@endif
		@endforeach
	</div>
	<!-- //Thriller -->

	<!-- Action -->
	<div class="top-brands">
		@php ($count=0)
		@php ($count1=0)
		@foreach($books as $f_loop)
			@if($count<1)
					<div class="container">
						<h3>Action</h3>	
							<div class="agileinfo_new_products_grids">
								
								@foreach($books as $book)
										@if($book->genre_name==='Action'||$book->genre_name==='action')
											<div class="col-md-3 agileinfo_new_products_grid">
												<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
													
															<div class="hs-wrapper hs-wrapper1">
																<img src="{{$book->image_url}}" alt="no images" class="img-responsive" />
																<div class="w3_hs_bottom w3_hs_bottom_sub">
																	<ul>
																		<li>
																			<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
																		</li>
																	</ul>
																</div>
															</div>
															<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</a></h5>
																							
															<div class="simpleCart_shelfItem">			
																<p>by <i class="item_price">
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
										@endif
								@endforeach
								
								<div class="clearfix"> </div>
							</div>	
					</div>
				@php($count++)
			@endif
		
			@if($count1<1)
				<a class="w3ls-cart" href="bookCategory/3" role="button"  style="float: right; padding-right:200px;">View More</a>
				@php($count1++)
			@endif
		@endforeach		
	</div> 
	<!-- //Action -->
	
@include('inc.footer')
@endsection