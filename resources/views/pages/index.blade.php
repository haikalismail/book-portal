@extends('layout.app')
@section('content')
@include('inc.header')
@include('inc.navigation')

<?php use App\book_author;?>
	<!-- banner -->
	<div class="banner">
			<div class="container">
				<h3 style="padding-left: 60px;">Book Portal, <span>Your World</span></h3>
			</div>
	</div>
	<!-- //banner --> 

	<!--Drama -->
	<div class="top-brands">
		<div class="container">
			<h3>Drama</h3>	
				<div class="agileinfo_new_products_grids">
						@if(count($books) > 0)
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
									<h5><a href="#">{{$book->book_title}}</a></h5>
																	
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
										<button href="#">View More</button>
									</div>
								
							</div>
						</div>
						@endif
						@endforeach
						@else
							<p>no books found</p>
						@endif
						
							<div class="clearfix"> </div>
							
						
					</div>	
			</div>
	</div>
	<!--//drama--> 
	
	<!-- Thriller -->
	<div class="new-products">
			<div class="container">
				<h3>Thriller</h3>	
					<div class="agileinfo_new_products_grids">
							@if(count($books) > 0)
							@foreach($books as $book)
							@if($book->genre_name==='thriller'||$book->genre_name==='Thriller')
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
										<h5><a href="#">{{$book->book_title}}</a></h5>
																		
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
											<button href="#">View More</button>
										</div>
									
								</div>
							</div>
							@endif
							@endforeach
							@else
								<p>no books found</p>
							@endif
							
								<div class="clearfix"> </div>
								
							
						</div>	
				</div>
		</div>
	<!-- //Thriller -->

	<div class="top-brands">
			<div class="container">
				<h3>Comedy</h3>	
					<div class="agileinfo_new_products_grids">
							@if(count($books) > 0)
							@foreach($books as $book)
							@if($book->genre_name==='comedy'||$book->genre_name==='Comedy')
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
										<h5><a href="#">{{$book->book_title}}</a></h5>
																		
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
											<button href="#">View More</button>
										</div>
									
								</div>
							</div>
							@endif
							@endforeach
							@else
								<p>no books found</p>
							@endif
							
								<div class="clearfix"> </div>
								
							
						</div>	
				</div>
		</div> 
    
@include('inc.footer')
@endsection