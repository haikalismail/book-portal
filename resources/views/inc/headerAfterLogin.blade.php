@extends('layouts.catapp')
@section('headerAfterLogin')
<!-- header -->
<div class="header" id="home1">
  <div class="container">
    <div class="w3l_login">
      <a href="#" style="display: block;margin-left: auto;margin-right: auto"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span></a>
		<p style="font-size:15px; ">Hi, user</p>
    </div>

    <div class="w3l_logo" style="text-align: center;">
      <h1><a href="index.html">Book Portal<span>Your Library. Your Way.</span></a></h1>
    </div>
    <div class="search">
      <input class="search_box" type="checkbox" id="search_box">
      <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
      
      <div class="search_form">
        <form action="#" method="post">
          <input type="text" name="Search" placeholder="Search...">
          <input type="submit" value="Send">
        </form>
      </div>

      <label style=" border-color=blue;"><a href="#" style="padding-left:20px;">logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></label>
    </div>
  </div>
</div>
<!-- //header -->

<!-- navigation -->
<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
					<li><a href="../pages/dashboard" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Categories</h6>
											<li><a href="#">Science Fiction</a></li>
											<li><a href="#">Drama</a></li> 
											<li><a href="#">Action and Adventures</a></li>
											<li><a href="#">Romance</a></li>
										</ul>
									</div>

									<div class="col-sm-3">
										<br>
										<ul class="multi-column-dropdown">
											<h6></h6>
											<li><a href="#">Mystery</a></li>
											<li><a href="#">Horror</a></li>
											<li><a href="#">Health</a></li>
											<li><a href="#">Guide</a></li>
										</ul>
									</div>

									<div class="col-sm-3">
										<br>
										<ul class="multi-column-dropdown">
											<h6></h6>
											<li><a href="#">Travel</a></li>
											<li><a href="#">Religious</a></li>
											<li><a href="#">History</a></li>
											<li><a href="#">Comic</a></li>
										</ul>
									</div>

									<div class="col-sm-3">
										<br>
											<ul class="multi-column-dropdown">
												<h6></h6>
												<li><a href="#">Journal</a></li>
												<li><a href="#">Biographies</a></li>
												<li><a href="#">Autobiographies</a></li>
												<li><a href="#">Fantasy</a></li>
											</ul>
										</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>

						<li><a href="#">Recommended Book</a></li> 
						 
						<li><a href="#">Mail Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
    <!-- //navigation -->
    @endsection