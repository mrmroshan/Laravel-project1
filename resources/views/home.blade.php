@extends('layout.master')

@section('content')
    <div class='centered'>
        
        @foreach($actions as $action)
        
            <a href="{{ route( 'niceaction' ,[ 'action' => lcfirst($action->name) ]) }}">{{ $action->name }}</a>
        
        @endforeach
        
        <br>
        @if(count($errors) > 0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                    {{ $error}}
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="post" action="{{ route('add_action') }}">
            <label for="name" label>Name of Action</label>
            <input type="text" id="name" name="name"/>
            <label for="niceness">Niceness</label>
            <input type="text" name="niceness" id="niceness"/>
            <button type="submit">Do a nice action!</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
@endsection