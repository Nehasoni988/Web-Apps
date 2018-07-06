@extends('master')

@include('todoTask.code')

@section('show')

<div class="grid">
    <p id="gcreate">Tasks</p>
    @if(!$task->isEmpty())
        @foreach($task as $t)
        <div class='gclass1'>
                   <div class="gtext"><a href="{{action('taskController@full',$t->id)}}" id="ganchor" title="Click Me">{{$t->title}}</a></div>
                   <div class="gridicon">
                        <div><a href="{{action('taskController@edit',$t->id)}}"><button id="gbutton"><i id="gedit" class="fa fa-edit text-info"></i></button></a></div>    
                        <div>
                                <form action="/show/{{$t->id}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <!--button id="delete" onclick="return del()">DELETE</button-->

                                        <button id="gbutton"><i id="gdelete" onclick="return del()" class="fa fa-trash text-danger"></i></button>
                                </form>
                        </div>
                   </div>
        </div>
        @endforeach      
    @else
        <div class="class1"><p id="not"><b>{{ $message }} </b></p></div>
    @endif
  
</div>
@endsection