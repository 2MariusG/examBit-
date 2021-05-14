



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">STATUS</div>
                <div class="card-body">

                    <form method="POST" action="{{route('form.store')}}">
                       Status: <input type="text" name="name" value="{{old('name')}}">

                        @csrf
                        <button class="btn btn-success" type="submit">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

