@extends('master')

@section('form')

<div class="todoForm">  

    <p id="create">Create A Task<a href="/welcome"><img src="home.png" id="home"></a></p>

    {!! Form::open(['url' => 'todohome']) !!}

          @include('todoTask.form')
          <div class="form-group">
            {!! Form::submit('+&ensp;Add',['class' => 'btn submit form-control']) !!}
          </div>
    {!!Form::close() !!}
    
    <div class='error'>
      @include('errors.list')
    </div>
</div>  

@endsection





