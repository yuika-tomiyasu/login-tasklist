@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Task List <span class="badge">{{ $count_tasks }}</span></a></li>
            
            </ul>
            @if (Auth::user()->id == $user->id)
                  {!! Form::open(['route' => 'tasks.store']) !!}
                      <div class="form-group">
                          <label>タスク</label>{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          <label>ステータス</label>{!! Form::textarea('status', old('status'), ['class' => 'form-control', 'rows' => '2']) !!}
                           {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($tasks) > 0)
                @include('tasks.tasks', ['tasks' => $tasks])
            @endif
        </div>
    </div>
@endsection