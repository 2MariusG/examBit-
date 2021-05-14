

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">STATUS LIST</div>
                <div class="card-body">
                    @foreach ($forms as $form)
                     <h3>{{$form->name}} <h3>
                    <div class="list-line__btn" >
                    <a href="{{route('form.edit',[$form])}}" class="btn btn-warning">EDIT</a>
                    <form method="POST" action="{{route('form.destroy', [$form])}}">
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

