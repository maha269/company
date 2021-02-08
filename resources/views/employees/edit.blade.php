@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>create employee</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('employee.update',['employee'=>$employee->id])}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{$employee->name}}">
                </div>
                <div class="form-group">
                    <button class="text-success form-control" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
