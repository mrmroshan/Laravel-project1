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
        <br><br><br>
        <ul>
            @foreach ($logged_actions as $logged_action)
                <li>
                    
                    {{ $logged_action->nice_action->name }}
                    
                        @foreach($logged_action->nice_action->categories as $category)
                           {{ $category->name }}
                        @endforeach    
                    
                    
                    </li>
            @endforeach
        </ul>
        
        {!!  $logged_actions->links() !!}
        
        @if($logged_actions->lastPage() > 1)
            @for($i =1; $i<= $logged_actions->lastPage(); $i++)
                <a href="{{ $logged_actions->url($i) }}">{{ $i }}</a>
            @endfor
        
        @endif
        
    </div>
@endsection