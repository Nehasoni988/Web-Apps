       
<div class="form-group">

{!! Form::label('title','Title',['class' => 'label']) !!}
{!! Form::text('title' ,null , ['class' => 'form-control','placeholder'=>'Task-Name','id' => 't','autocomplete' => 'off']) !!}

</div>

<div class="form-group">

{!! Form::label('description','Description',['class' => 'label']) !!}
{!! Form::textarea('description' ,null , ['class' => 'form-control','placeholder'=>'About','id' => 'd','autocomplete' => 'off']) !!}

</div>

<div class="form-group">

{!! Form::label('deadline','Deadline',['class' => 'label']) !!}
{!! Form::input('date','deadline',date('Y-m-d'), ['class' => 'form-control']) !!}

</div>





