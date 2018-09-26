
<!-- header after login-->
<div class="header" id="home1">
  <div class="container">
    <div class="w3l_login">
      <a href="#" style="display: block;margin-left: auto;margin-right: auto"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span></a>
		<p style="font-size:15px; ">Hi, {{ Auth::user()->user_fname }}</p>
		</div>
		
		<a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
				</a>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

      <!--label style=" border-color=blue;"><a href="#" style="padding-left:20px;">logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></label-->
    </div>
  </div>
</div>
<!-- //header after login-->
