@extends('layout.app')

@section('content')
@include('inc.header')
@include('inc.navigation')
<h1>create</h1>

{!! Form::open(['action' => 'PostController@store', 'method'=>'POST']) !!}
    <div class="form-group">
                            {{Form::label('fname','First Name')}}
                            {{Form::text('fname','',['class'=>'form-control','placeholder'=>'First Name'])}}
                        
                            {{Form::label('lname','Last Name')}}
                            {{Form::text('lname','',['class'=>'form-control','placeholder'=>'Last Name'])}}

                            {{Form::label('username','Userame')}}
                            {{Form::text('username','',['class'=>'form-control','placeholder'=>'Userame'])}}
                        
                            {{Form::label('dob','Date of Birth')}}
                            {{Form::Date('dob','',['class'=>'form-control','placeholder'=>'YYYY-MM-DD'])}}

                            {{Form::label('pword','Password')}}
                            {{Form::text('pword','',['class'=>'form-control','placeholder'=>'Password'])}}

                            {{Form::label('cPword','Confirm Password')}}
                            {{Form::text('cPword','',['class'=>'form-control','placeholder'=>'Confirm Password'])}}

                            {{Form::label('address','Address')}}
                            {{Form::text('address1','',['class'=>'form-control','placeholder'=>'Address'])}}
                            {{Form::text('address2','',['class'=>'form-control','placeholder'=>''])}}
                            {{Form::text('address3','',['class'=>'form-control','placeholder'=>''])}}

                            {{Form::label('cNo','Contact Number')}}
                            {{Form::text('cNo','',['class'=>'form-control','placeholder'=>'0123456789'])}}

                            {{Form::label('email','Email')}}
                            {{Form::text('email','',['class'=>'form-control','placeholder'=>'test@test.com'])}}
                          
                            {{Form::label('genre','Preference Genre')}}
                            <div class="checkbox">
                              {{Form::checkbox('genre[]','Science Fiction')}}
                              {{Form::checkbox('genre[]','Drama')}}
                              {{Form::checkbox('genre[]','Action and Adventure')}}
                              {{Form::checkbox('genre[]','Romance')}}
                              {{Form::checkbox('genre[]','Mystery')}}
                              {{Form::checkbox('genre[]','Horror')}}
                              {{Form::checkbox('genre[]','Health')}}
                              {{Form::checkbox('genre[]','Guide')}}
                              {{Form::checkbox('genre[]','Travel')}}
                              {{Form::checkbox('genre[]','Religious')}}
                              {{Form::checkbox('genre[]','History')}}
                              {{Form::checkbox('genre[]','Comics')}}
                              {{Form::checkbox('genre[]','Journals')}}
                              {{Form::checkbox('genre[]','Biographies')}}
                              {{Form::checkbox('genre[]','Autobiographies')}}
                              {{Form::checkbox('genre[]','Fantasy')}}
                            </div>
                          </div>
    {{Form::submit('Sign In',['class'=>'btn btnm-primary'])}}
{!! Form::close() !!}

@endsection

