@extends('layout.app')

@section('header')
<!-- header modal -->
@guest
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;</button>
        <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
      </div>
      <div class="modal-body modal-body-sub">
        <div class="row">
          <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
            <div class="sap_tabs">	
              <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul>
                  <li class="resp-tab-item" aria-controls="tab_item-0"><a class="nav-link" href="#">{{ __('Login') }}</a></li>
                  <li class="resp-tab-item" aria-controls="tab_item-1"><a class="nav-link" href="#">{{ __('Register') }}</a></li>
                </ul>		
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                  <div class="facts">
                    <div class="register">
                        @include('auth.login')
                    </div>
                  </div> 
                </div>	 
                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                  <div class="facts">
                    <div class="register">
                        @include('auth.register')
                    </div>
                  </div>
                </div> 			        					            	      
              </div>	
            </div>
            <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
              $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                  type: 'default', //Types: default, vertical, accordion           
                  width: 'auto', //auto or any width like 600px
                  fit: true   // 100% fit in a container
                });
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@else
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user_reader()->user_fname }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
@endguest

<script>
  $('#myModal88').modal('show');
</script>  
<!-- header modal -->
<!-- header -->
<div class="header" id="home1">
  <div class="container">
    <div class="w3l_login">
      <a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
    </div>
    <div class="w3l_logo" style="text-align: center;">
      <h1><a href="index.html">Book Portal<span>Your Library. Your Way.</span></a></h1>
    </div>
    <div class="search">
      <input class="search_box" type="checkbox" id="search_box">
      <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
      <div class="search_form">
        <form action="#" method="post">
          <input type="text" name="q" placeholder="Search...">
          <input type="submit" value="Send">
        
          <!-- Dispay recorded database 
          <div class="container">
              @if(isset($details))
              <h2>Search Results for <b> {{ $query }} </b> ...</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Unit Available</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($details as $user)
                  <tr>
                    <td>{{$user->book_id}}</td>
                    <td>{{$user->book_title}}</td>
                    <td>{{$user->book_isbn}}</td>
                    <td>{{$user->book_location}}</td>
                    <td>{{$user->book_status}}</td>
                    <td>{{$user->book_unit}}</td>
        
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
              @endif
            </div>-->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- //header -->
@endsection