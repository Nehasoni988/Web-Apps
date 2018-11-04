@extends('master')

@include('todoTask.code')
@section('show')
<div id="show1">
      <p id="create">{{$top}}</p>
      @if(!$task->isEmpty())
            @foreach($task as $t)
                  <div class='class1'>
                        <p class="text"><a href="{{action('taskController@full',$t->id)}}" id="anchor" title="Click Me">{{$t->title}}</a>
                          <span id="showdate">{{$t->created_at}}</span>
                        </p>
                        
                        <form action="/show/{{$t->id}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button id="delete" onclick="return del()">DELETE</button>
                              <!--button id="delete" onclick="return confirm('Are You Sure')">DELETE</button-->
                        </form> 
                        <a href="{{action('taskController@edit',$t->id)}}"><button id="edit"><span>EDIT</span></button></a>
                  </div>
            @endforeach      
      @else
            <div class="class1">efsefs<p id="not"><b> {{ $message }} </b></p></div>
            <!-- <span>create an article<a href="#">{{ $title }}</a></span> -->
      @endif
</div>
@endsection