@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>create company</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('employee.store')}}">
                @csrf
                <div class="form-group">
                    <label> name </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label> email </label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label> company </label>
                    <select class="form-select" aria-label="Default select example" name="company">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-success form-control" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
