@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TASK UPDATE</div>
                <div class="card-body">
                    <form method="POST" action="{{route('task.update', [$task->id])}}">

                        <div class="form-group">
                            <label> Uzduoties Pavadinimas:</label>
                            <input type="text" class="form-control" name="task_name" value="{{old('task_name',$task->task_name)}}">
                            <small class="form-text text-muted">Atnaujinti informacija</small>
                        </div>
                        <div class="form-group">
                            <label> Uzduoties Aprasymas:</label>
                            <textarea type="text" class="form-control" name="task_description" id="summernote">{!!$task->task_description!!}</textarea>
                            <small class="form-text text-muted">Atnaujinti informacija</small>
                        </div>
                        <div class="form-group">
                            <label> Atlikimo pradzia:</label>
                            <input type="date" class="form-control" name="add_date" value="{{$task->add_date}}">
                            <small class="form-text text-muted">Atnaujinti informacija</small>
                        </div>
                        <div class="form-group">
                            <label> Uzduoti Atlikti iki:</label>
                            <input type="date" class="form-control" name="completed_date" value="{{$task->completed_date}}">
                            <small class="form-text text-muted">Atnaujinti informacija</small>
                        </div>

                        <select class="col-4" name="form_id">
                            @foreach ($forms as $form)

                            <option value="{{$form->id}}" @if($form->id == $task->form_id) selected @endif>
                                {{$form->name}}
                            </option>
                            @endforeach
                        </select>

                        @csrf
                        <button type="submit" class="btn btn-success">UPDATE</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script>
      <script>
          $(document).ready(function() {
              $('#summernote').summernote();
          });

      </script>


    </script>

    @endsection
