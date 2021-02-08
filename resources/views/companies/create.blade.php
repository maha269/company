@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>create company</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('company.store')}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success form-control" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
