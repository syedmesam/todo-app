@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('upload')}}">
                      @csrf
                       <div class="form-group">
                         <label for="exampleInputEmail1">Title</label>
                         <input type="text" id="title" name="title" class="form-control" required>
                       </div>
        
                       <div class='input-group date' id='CalendarDateTime'>
                        <label for="exampleInputEmail1">Deadline</label>
                        <input type='text' name="datetime" class="form-control" required/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                       </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                       
                     </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function() {
         $('#CalendarDateTime').datetimepicker();
      });
  </script> 
@endsection
