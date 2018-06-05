<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Pacific Prime</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/cc.css') }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/cc.js') }}"></script> -->
      
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            
            <!-- Form on left side -->
            <div class="col-md-6">
                <h1 style="font-weight: bold;"> Form </h1>

                {!! Form::open(['action'=>'TestController@save_data', 'method' => 'post','files' => true, 'enctype' => 'multipart/form_data']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{ Form::label('name', 'Name')}} <span style="color: red">*</span>
                    {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required'])}}

                    {{ Form::label('phone', 'Phone')}} <span style="color: red">*</span>
                    {{ Form::number('phone', '', ['class' => 'form-control', 'required' => 'required'])}}

                    {{ Form::label('email', 'Email')}} <span style="color: red">*</span>
                    {{ Form::email('email', '', ['class' => 'form-control', 'required' => 'required'])}}

                    {{ Form::label('company', 'Company')}} <span style="color: red">*</span>
                    {{ Form::text('company', '', ['class' => 'form-control', 'required' => 'required'])}}

                    {{ Form::label('image', 'Image')}} <span style="color: red">*</span>
                    {{ Form::file('image', ['class' => 'form-control', 'required' => 'required'])}}
                    <br>
                    {{ Form::submit('SUBMIT', ['class' =>'btn btn-orange'])}}
                    
                {!! Form::close() !!}
            </div>
            <!-- Result from form on right side -->
            <div class="col-md-6" style="padding-left: 5%">
                <h1 style="font-weight: bold;"> Results: </h1>
                <div id="result"> 
                    @if(!is_null($data))
                        <span style="font-weight: bold; font-size: 22px;"> {{ $data->name }} </span>
                        <br><br>
                        <span style="font-weight: bold; font-size: 22px;"> {{ $data->phone }} </span>
                        <br><br>
                        <span style="font-weight: bold; font-size: 22px;"> {{ $data->email }} </span>
                        <br><br>
                        <span style="font-weight: bold; font-size: 22px;"> {{ $data->company }} </span>
                        <br><br>
                        <img src="{{ $data->image }}" alt="company-logo">
                    @else
                        <span style="font-weight: bold; font-size: 22px;"> Not Found Data in Database. Please add your data. </span>
                    @endif
                </div>
            </div>
        </div>
    </div>    
    </body>
</html>