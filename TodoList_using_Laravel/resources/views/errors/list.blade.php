@if($errors->any())

   <ul class=" alert alert-danger" id='error'>
      @foreach($errors->all() as $e)
      <li>
        {{$e}}
      </li>
      @endforeach
   </ul>

  @endif
