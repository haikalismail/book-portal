
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--user id-->
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User Id') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required autofocus>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--first name-->
                        <div class="form-group row">
                            <label for="user_fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="user_fname" type="text" class="form-control{{ $errors->has('user_fname') ? ' is-invalid' : '' }}" name="user_fname" value="{{ old('user_fname') }}" required autofocus>

                                @if ($errors->has('user_fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--last name-->
                        <div class="form-group row">
                                <label for="user_lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_lname" type="text" class="form-control{{ $errors->has('user_lname') ? ' is-invalid' : '' }}" name="user_lname" value="{{ old('user_lname') }}" required autofocus>
    
                                    @if ($errors->has('user_lname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_lname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--username-->
                        <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--date of birth-->
                        <div class="form-group row">
                                <label for="user_dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_dob" type="date" class="form-control{{ $errors->has('user_dob') ? ' is-invalid' : '' }}" name="user_dob" value="{{ old('user_dob') }}" required autofocus>
    
                                    @if ($errors->has('user_dob'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--userpass-->
                        <div class="form-group row">
                                <label for="userpass" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="userpass" type="password" class="form-control{{ $errors->has('userpass') ? ' is-invalid' : '' }}" name="userpass" required>
    
                                    @if ($errors->has('userpass'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('userpass') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        
                        <!--confirm userpass-->
                        <div class="form-group row">
                            <label for="userpass-confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="userpass-confirmation" type="password" class="form-control" name="userpass_confirmation" required>
                            </div>
                        </div>
                        
                        <!--user_address-->
                        <div class="form-group row">
                                <label for="user_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_address" type="text" class="form-control{{ $errors->has('user_address') ? ' is-invalid' : '' }}" name="user_address" value="{{ old('user_address') }}" required autofocus>
    
                                    @if ($errors->has('user_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--user_city-->
                        <div class="form-group row">
                                <label for="user_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_city" type="text" class="form-control{{ $errors->has('user_city') ? ' is-invalid' : '' }}" name="user_city" value="{{ old('user_city') }}" required autofocus>
    
                                    @if ($errors->has('user_city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--user_state-->
                        <div class="form-group row">
                                <label for="user_state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_state" type="text" class="form-control{{ $errors->has('user_state') ? ' is-invalid' : '' }}" name="user_state" value="{{ old('user_state') }}" required autofocus>
    
                                    @if ($errors->has('user_state'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--contact number-->
                        <div class="form-group row">
                                <label for="user_phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="user_phone" type="text" class="form-control{{ $errors->has('user_phone') ? ' is-invalid' : '' }}" name="user_phone" value="{{ old('user_phone') }}" required autofocus>
    
                                    @if ($errors->has('user_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <!--user_email-->
                        <div class="form-group row">
                            <label for="user_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
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
                            <label for="user_category" class="col-md-4 col-form-label text-md-right">{{ __('Preference category') }}</label><br><br>
                            <input type="checkbox" name="user_category" value="Sci-fi" onclick="return Validateuser_categorySelection();">Science Fiction<br>  
                            <input type="checkbox" name="user_category" value="drama" onclick="return Validateuser_categorySelection();">Drama<br>  
                            <input type="checkbox" name="user_category" value="action" onclick="return Validateuser_categorySelection();">Action and Adventure<br>
                            <input type="checkbox" name="user_category" value="romance" onclick="return Validateuser_categorySelection();">Romance<br>
                            <input type="checkbox" name="user_category" value="mystery" onclick="return Validateuser_categorySelection();">Mystery<br>
                            <input type="checkbox" name="user_category" value="horror" onclick="return Validateuser_categorySelection();">Horror<br>
                            <input type="checkbox" name="user_category" value="health" onclick="return Validateuser_categorySelection();">Health<br>
                            <input type="checkbox" name="user_category" value="guide" onclick="return Validateuser_categorySelection();">Guide<br>
                            <input type="checkbox" name="user_category" value="travel" onclick="return Validateuser_categorySelection();">Travel<br>
                            <input type="checkbox" name="user_category" value="religious" onclick="return Validateuser_categorySelection();">Religious<br>
                            <input type="checkbox" name="user_category" value="history" onclick="return Validateuser_categorySelection();">History<br>
                            <input type="checkbox" name="user_category" value="comic" onclick="return Validateuser_categorySelection();">Comics<br>
                            <input type="checkbox" name="user_category" value="jornal" onclick="return Validateuser_categorySelection();">Journals<br>
                            <input type="checkbox" name="user_category" value="biographies" onclick="return Validateuser_categorySelection();">Biographies<br>
                            <input type="checkbox" name="user_category" value="autobiographies" onclick="return Validateuser_categorySelection();">Autobiographies<br>
                            <input type="checkbox" name="user_category" value="fantasy" onclick="return Validateuser_categorySelection();">Fantasy<br>  
                             
                        </fieldset>
                        
                        <!--check count of user_category selected-->
                        <script type="text/javascript">  
                            function Validateuser_categorySelection()  
                            {  
                                    var checkboxes = document.getElementsByName("user_category");  
                                    var numberOfCheckedItems = 0;  
                                    for(var i = 0; i < checkboxes.length; i++)  
                                    {  
                                            if(checkboxes[i].checked)  
                                                    numberOfCheckedItems++;  
                                    }  
                                    if(numberOfCheckedItems > 5)  
                                    {  
                                            alert("You can't select more than five Category!");  
                                            return false;  
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
                    </form>
                </div>
            </div>
        </div>
    </div>

