@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">UPDATE STATUS</div>

                <div class="card-body">
                    <form method="POST" action="{{route('form.update',[$form->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>STATUS NAME:</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$form->name)}}">
                            <small class="form-text text-muted">Atnaujinti informacija</small>
                        </div>
                        <button type="submit" class="btn btn-warning">UPDATE</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
