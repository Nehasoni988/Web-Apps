@extends('master')

@section('form')

<div class="todoForm">
     <p id="create">Update Task<a href="/todohome"><img src="/home.png" id="home"></a></p>
      {!! Form::model($task,['method' => 'PATCH','action' =>['taskController@update',$task->id] ]) !!}
                @include('todoTask.form')
                <div class="form-group">
                  {!! Form::submit('Update',['class' => 'btn submit form-control']) !!}
                </div>
      {!!Form::close() !!}
      <div class='error'>
        @include('errors.list')
      </div>
</div>   

@endsection