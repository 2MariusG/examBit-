@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TASKS</div>
                 <div class="card-header">
                     <form action="{{route('task.index')}}" method="get" class="make-inline">
                         <div class="form-group make-inline">
                            
                             <select class="form-control" name="form_id">
                                 <option value="0" disabled @if($filterBy==0) selected @endif>Select task</option>

                                 @foreach ($forms as $form)
                                 <option value="{{$form->id}}" @if($filterBy==$form->id) selected @endif> {{$form->name}} </option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group make-inline">
                             <div class="form-check">
                                 <input class="form-check-input" type="radio" name="sort" value="asc" @if($filterBy=='asc' ) checked @endif id="sortBy">
                                 <label class="form-check-label" for="sortBy">By Name</label>
                             </div>
                             <div class="form-check check">
                                 <input class="form-check-input" type="radio" name="sort" value="desc" @if($filterBy=='desc' ) checked @endif id="sortByDesc">
                                 <label class="form-check-label" for="sortByDesc">By Date</label>
                             </div>
                         </div>
                         <button type="submit" class="btn btn-info">Filter</button>
                         <a href="{{route('task.index')}}" class="btn btn-info">Clear filter</a>
                     </form>
                 </div>

                <div class="card-body">
                    @foreach ($tasks as $task)
                    <div>
                    {{$task->taskForm->task_name}}
                    Pavadinimas: {{$task->task_name}}<br>
                    Aprasymas: {!!$task->task_description!!}<br>
                    </div>
                    <div>   
                    Atlikimo pradzia: {{$task->add_date}}<br>
                    Atlikti iki: {{$task->completed_date}}<br>
                    </div>
                    <div class="list-line__btn">
                        <a href="{{route('task.edit',[$task])}}" class="btn btn-success">EDIT</a>
                        <form method="POST" action="{{route('task.destroy', [$task])}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




