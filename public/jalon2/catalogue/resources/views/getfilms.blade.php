
    @extends('template')
    @section('content')


    @foreach($categories as $cat)
        <h1>{{$cat->name}}</h1>
    @endforeach

    @stop

