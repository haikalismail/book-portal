
<?php use App\book_genre; ?>
    <div class="row justify-content-center">
        <div style=" margin:15px">
            <div class="col-lg-12 well">
                <div class="row">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--first name-->
                        <div class="form-group row">
                            
                            <!--First Name & Last Name-->
                            <div class="row">
                                <!--first name-->
                                <div class="col-sm-6 form-group">
                                    <label for="user_fname">{{ __('First Name') }}</label>

                                    <input id="user_fname" type="text" class="form-control{{ $errors->has('user_fname') ? ' is-invalid' : '' }}" name="user_fname" value="{{ old('user_fname') }}" required autofocus>

                                    @if ($errors->has('user_fname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- end first name-->
                                
                                <!--Last name-->
                                <div class="col-sm-6 form-group">
                                    <label for="user_lname">{{ __('Last Name') }}</label>
        
                                        <input id="user_lname" type="text" class="form-control{{ $errors->has('user_lname') ? ' is-invalid' : '' }}" name="user_lname" value="{{ old('user_lname') }}" required autofocus>
        
                                        @if ($errors->has('user_lname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_lname') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <!--End Last name-->
                            </div>

                            <!--userame & DOB-->
                            <div class="row">
                                <!--username-->
                                <div class="col-sm-6 form-group">
                                        <label for="username">{{ __('Username') }}</label>
        
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
        
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                        
                                </div>

                                <!--date of birth-->
                                <div class="col-sm-6 form-group">
                                    <label for="user_dob">{{ __('Date of Birth') }}</label>
        
                                        <input id="user_dob" type="date" class="form-control{{ $errors->has('user_dob') ? ' is-invalid' : '' }}" name="user_dob" value="{{ old('user_dob') }}" required autofocus>
        
                                        @if ($errors->has('user_dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_dob') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!--password &confirm password-->
                            <div class="row">
                                <!--userpass-->
                                <div class="col-sm-6 form-group">
                                    <label for="password">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--confirm userpass-->
                                <div class="col-sm-6 form-group">
                                    <label for="password-confirmation">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <!--user_address-->
                            <div class="form-group">
                                    <label for="user_address">{{ __('Address') }}</label>
        
                                        <input id="user_address" type="text" class="form-control{{ $errors->has('user_address') ? ' is-invalid' : '' }}" name="user_address" value="{{ old('user_address') }}" required autofocus>

                                        @if ($errors->has('user_address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_address') }}</strong>
                                            </span>
                                        @endif
                            </div>

                            <!--City & State-->
                            <div class="row">
                                <!--user_city-->
                                <div class="col-sm-6 form-group">
                                    <label for="user_city">{{ __('City') }}</label>
    
                                    <input id="user_city" type="text" class="form-control{{ $errors->has('user_city') ? ' is-invalid' : '' }}" name="user_city" value="{{ old('user_city') }}" required autofocus>
    
                                    @if ($errors->has('user_city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_city') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--user_state-->
                                <div class="col-sm-6 form-group">
                                        <label for="user_state">{{ __('State') }}</label>
            
                                            <!--<input id="user_state" type="text" class="form-control{{ $errors->has('user_state') ? ' is-invalid' : '' }}" name="user_state" value="{{ old('user_state') }}" required autofocus-->
            
                                            <select id="user_state" type="text" class="form-control{{ $errors->has('user_state') ? ' is-invalid' : '' }}" name="user_state" value="{{ old('user_state') }}" required autofocus>
                                                <option value="#">Select your state.....</option>
                                                <option value="Johor">Johor</option>
                                                <option value="Kedah">Kedah</option>
                                                <option value="Kelantan">Kelantan</option>
                                                <option value="Melaka">Melaka</option>
                                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                <option value="Pahang">Pahang</option>
                                                <option value="Pulau Pinang">Pulau Pinang</option>
                                                <option value="Perak">Perak</option>
                                                <option value="Perlis">Perlis</option>
                                                <option value="Sabah">Sabah</option>
                                                <option value="Sarawak">Sarawak</option>
                                                <option value="Selangor">Selangor</option>
                                                <option value="Terengganu">Terengganu</option>
                                                <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                                                <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                                                <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
                                            </select>

                                            @if ($errors->has('user_state'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_state') }}</strong>
                                                </span>
                                            @endif
                                </div>

                            </div>

                            <!--Phone No & email-->
                            <div class="row">
                                <!--contact number-->
                                <div class="col-sm-6 form-group">
                                        <label for="user_phone">{{ __('Contact Number') }}</label>

                                            <input id="user_phone" type="text" class="form-control{{ $errors->has('user_phone') ? ' is-invalid' : '' }}" name="user_phone" value="{{ old('user_phone') }}" required autofocus>
            
                                            @if ($errors->has('user_phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_phone') }}</strong>
                                                </span>
                                            @endif
                                </div>

                                <!--user_email-->
                                <div class="col-sm-6 form-group">
                                    <label for="user_email">{{ __('E-Mail Address') }}</label>

                                        <input id="user_email" type="email" class="form-control{{ $errors->has('user_email') ? ' is-invalid' : '' }}" name="user_email" value="{{ old('user_email') }}" required>

                                        @if ($errors->has('user_email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!--user_category--> 
                            <fieldset>  
                                <label for="category">{{ __('Preference category') }}<br><br>
                                @php($book_genre = book_genre::select('*')
                                                    ->get())

                                            @foreach($book_genre as $book_genres)
                                            <div class= 'col-xs-4' > <input type="checkbox" name="category[]" id="{{$book_genres->genre_id}}" value="{{$book_genres->genre_id}}" onclick="return Validateuser_categorySelection();">  {{$book_genres->genre_name}}</div>
                                            @endforeach
                                            <h6><br>**You can choose up to 5 category that you like</h6><br><br>
                                </label>
                            </fieldset>

                            <!--check count of user_category selected-->
                            <script type="text/javascript">  
                                function Validateuser_categorySelection()  
                                {  
                                        var checkboxes = document.getElementsByName("category[]");  
                                        var numberOfCheckedItems = 0;  
                                        for(var i = 0; i < checkboxes.length; i++)  
                                        {  
                                                if(checkboxes[i].checked)
                                                {
                                                    numberOfCheckedItems++;
                                                    //alert(numberOfCheckedItems);
                                                
                                                    if(numberOfCheckedItems > 5)  
                                                    {  
                                                            alert("You can't select more than five Category!");
                                                            //checkboxes[i].checked = false ;  
                                                            return false;  
                                                    }
                                                } 
                                        }  
                                }
                            </script>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

