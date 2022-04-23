@extends('layouts.app')

@section('content')
<script type="text/JavaScript" src="https://MomentJS.com/downloads/moment.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TODO List') }}</div>
                <a class="btn btn-primary" href="{{route('create')}}" >Create Task</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover table-reflow">
                        <thead>
                            <tr>
                                <th ><strong> Task: </strong></th>
                                <th ><strong> Status: </strong></th>
                                <th ><strong> Deadline: </strong></th>
                                <th ><strong> Edit: </strong></th>
                                
                                <th ><strong> Delete: </strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todo_lists as $todo)
                            <tr>
                                <td> {{ $todo->title }} </td>
                                <td> {{ $todo->status }} </td>
                                <td> 
                                    <script>
                                        document.write(moment.utc(<?php echo $todo->dead_line ?>).local());
                                    </script>
                                    
                                
                                </td>
                                <td> <a class="btn btn-success" href="{{route('edit',$todo->id)}}" >Edit</a> </td>
                                <td> <a class="btn btn-danger" href="{{route('deleteTodo',$todo->id)}}" >Delete</a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    
                        
                    
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
