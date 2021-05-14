@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TASKS</div>
                  <div class="card-body">

                    <form method="POST" action="{{route('task.store')}}">


                    <div class="form-group">
                        <label> Uzdoties Pavadinimas:</label>
                        <input type="text" class="form-control" name="task_name" value="{{old('task_name')}}">
                        <small class="form-text text-muted">Irasyti pavadinima</small>
                    </div>
                    <div class="form-group">
                        <label> Uzdoties Aprasymas:</label>
                        <textarea id="summernote" class="form-control" name="task_description" value="{{old('task_description')}}"></textarea>
                        <small class="form-text text-muted">Irasyti uzduoti</small>
                    </div>
                     <div class="form-group">
                         <label> Atlikimo pradzia:</label>
                         <input type="date" class="form-control" name="add_date" >
                         <small class="form-text text-muted">Pradzios Laikas.</small>
                     </div>
                      <div class="form-group">
                          <label> Uzdoti Atlikti iki:</label>
                          <input type="date" class="form-control" name="completed_date">
                          <small class="form-text text-muted">Pradzios Laikas.</small>
                      </div>

                        @csrf
                        <select name="form_id">
                            @foreach ($forms as $form)
                            <option value="{{$form->id}}">{{$form->name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-success">ADD</button>
                    </form>

                </div>
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
