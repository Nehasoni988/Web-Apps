@extends('master')

@include('todoTask.code')
@section('show')

<div id="show1">
      <p id="create">{{$top}}</p>
      @foreach($task as $t)
                  <div class='class1'>
                        <p class="text"><b>Title</b>{{$t->title}}</p>
                        <p class="text"><b>Description</b>{{$t->description}}</p>
                        <p class="text"><b>Deadline</b>{{$t->deadline}}</p>
                        <form action="/show/{{$t->id}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button id="delete" onclick="return del()">DELETE</button>
                        </form> 
                        <a href="{{action('taskController@edit',$t->id)}}"><button id="edit"><span>EDIT</span></button></a>
                  </div>
            @endforeach  
</div>

@endsection