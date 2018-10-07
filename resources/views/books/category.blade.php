@extends('layouts.catapp')

@section('content')	
<?php use App\book_author; ?>
			<!--ITEMS-->
				<div class="col-md-8 w3ls_mobiles_grid_right">
					<!--TIGA YANG FIRST-->
					<div class="w3ls_mobiles_grid_right_grid3">
						@if(count($books) > 0)
						@foreach($books as $book)
							<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
								<div class="agile_ecommerce_tab_left mobiles_grid">
									<div class="hs-wrapper hs-wrapper2">
										<img src="image/{{$book->image_url}}" alt="No Image" class="img-responsive"/>	
									</div>
									<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</h5>
									<div class="col-md-12">
										<div class="rating1">
											@php($authors = book_author::select('*')
												->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
												->where('book_id',$book->book_id)
												->get())
											<p>
											@foreach($authors as $author)
											{{$author->author_fname}} {{$author->author_lname}}
											@endforeach
											</p>
										</div>
										<a class="button button2" href="book/{{$book->book_id}}" role="button">View More</a>
									</div> 
								</div>
							</div>
						@endforeach
						@else
						<p>no books found</p>
						@endif
						<div class="clearfix"> </div>
					</div>
				</div>
			<!--END ITEMS-->

@endsection
