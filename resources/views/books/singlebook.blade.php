@extends('layouts.singleitem')

@section('content')	


	<!-- single -->

	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<div>
						<img src="{{$book->image_url}}" alt="Image tak keluar" class="img-responsive" data-imagezoom="true"/> 
					</div>
					
				</div>
				
			</div>
			<div class="col-md-8 single-right">
				<h3>{{$book->book_title}}</h3>

				<!--INSERT RATING HERE-->
				<!--update the id whenver rating_id is obtainable-->
				{!! Form::open(['id'=>'rating-form','action'=>['ratingCont@update',$book->book_id],'method'=>'POST']) !!} 
				<h4>Avg Rating {{round($avgratings->average,2)}} </h4>
				<div class="rating1">
						{{Form::label('title','Your Rating')}}
						@if(!is_null($ratings))
						<p>{{$ratings->rating}}</p>
						
						@else
						<p></p>
						@endif
				<span class="starRating">
					{{Form::hidden('_method','PUT')}}
					<input id="rating5" type="radio" name="rating" value="5" onchange="updateRating()">
					<label for="rating5" >5</label>
					<input id="rating4" type="radio" name="rating" value="4" onchange="updateRating()">
					<label for="rating4" >4</label>
					<input id="rating3" type="radio" name="rating" value="3" onchange="updateRating()">
					<label for="rating3" >3</label>
					<input id="rating2" type="radio" name="rating" value="2" onchange="updateRating()">
					<label for="rating2"> 2</label>
					<input id="rating1" type="radio" name="rating" value="1" onchange="updateRating()">
					<label for="rating1" >1</label>
					
				</span>
				
				</div>	
				{!! Form::close() !!}
			


				<!--END RATING-->

				<div class="description">
					<h5><i>Description</i></h5>
					<h6><b>all contributors name :</b> <!--clear this line later-->

						@if(count($authors) > 0)
						@foreach($authors as $author)
							{{$author->author_name}} 
						@endforeach
						@endif
						
						@if(!is_null($ratings))
						
						<!--clear this line later when star can be display-->
						@endif
					</h6>
							<p>ISBN :		{{$book->book_isbn}}</p>
							<p>Year :		{{$book->book_year}}</p>
							<p>Location :	{{$book->book_location}}</p>
							<p>Status	:	{{$book->book_status}}</p>
							<p>Unit		:	{{$book->book_unit}}</p>
							<p>Publisher:	{{$book->publisher_name}}</p>
				</div>
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 

	

	<!--TEE INSERT REVIEW-->
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
						
					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<h4>Reviews</h4>
						
						@foreach($reviews as $review)
						<div class="additional_info_sub_grids">
						
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<h4>{{$review->user_fname}}</h4>
									<h5>Wrote on {{$review->review_date}}</h5>
									<p>{{$review->review}}</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
								@if(is_null($review->rating))
									<p>No Rating Given</p>
								@else
									<p>User Rated: {{$review->rating}}</p>
								@endif
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endforeach
						
						{{ $reviews->links() }}
						<div class="review_grids">
							@if(is_null($userreviews))
								<h5>Add A Review </h5>
								
									{!! Form::open(['id'=>'review-form','action'=>['reviewCont@update',$book->book_id],'method'=>'POST', 'onsubmit'=>'event.preventDefault(); updateReview()']) !!}
									{{Form::hidden('_method','PUT')}}
									<div class='form-group'>
											{{Form::label('review','Write your Review')}}
											{{Form::textarea('review','',['id' => 'article-ckeditor' , 'class'=>'form-control' , 'placeholder'=> 'Your review body','required' => 'required'])}}
											
									</div>
									{{form::submit('Save')}}
									{!! Form::close() !!}
							@else
								<div class="additional_info_sub_grids">
										<h5> Your review </h5>
										<div class="col-xs-12 additional_info_sub_grid_right">
											<div class="additional_info_sub_grid_rightl">
													{{$userreviews->user_fname}}
												<h5>{{$userreviews->review}}</h5>
												<small>Wrote on {{$userreviews->review_date}}</small>
											</div>
											<div class="additional_info_sub_grid_rightr">
												<div class="rating">
													
													<div class="clearfix"> </div>
												</div>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="clearfix"> </div>
									</div>
								
							@endif	
						</div>
					</div> 			        					            	      
				</div>	
			</div>
			
		</div>
	</div>
	<!--REVIEW END-->
	
	<!-----------------------------HAIKAL RECOMMENDATION----------------------------->
	<div id="make-reco">
		<ul>
			<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Books That You May Like</span></li>			
		</ul>

		<!-- Display Recommended Books -->
		<p>
				
				@foreach($reco as $recos)
				<div class="col-md-3 agile info_new_products_grid agile info_new_products_grid_mobiles">
					<div class="agile_ecommerce_tab_left mobiles_grid">
						<div class="hs-wrapper hs-wrapper2">
							<a href="/book/{{$recos->book_id}}"><img src = "{{$recos->small_img_url}}" alt="No Image" class="img-responsive"/></a>
						</div>
						
						<div style="height:60px;max-height:60px;display:inline-block;text-align:center;">
							<h5><a href="/book/{{$recos->book_id}}">{{$recos->book_title}}</h5>
						</div>
						<br/>
						<div style="height:30px;max-height:30px;display:inline-block;text-align:center;">
								<p>
								@foreach($authors as $author)
								{{$author->author_name}}
								@endforeach
								</p>
						</div> 
					</div>
				</div>
				@endforeach
		</p>
	</div>
	<!-------------------RECOMMENDATION END-------------------------->

	<!-- //single -->  
	<script>
		function updateRating() {
			var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
			if(!loggedIn){
				$("input:radio").removeAttr("checked");
				$('#myModal88').modal('show');
			}
			else{
				document.getElementById("rating-form").submit();
			}
		}

		function updateReview() {
			var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
			if(!loggedIn){
				
				$('#myModal88').modal('show');
				return false;
			}
			else{
				document.getElementById("review-form").submit();
			}
		}
	</script>
@endsection