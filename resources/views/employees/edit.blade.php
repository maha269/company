@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>create employee</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('employee.update',['employee'=>$employee->id])}}">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label> name </label>
                    <input type="text" class="form-control" name="name" value="{{$employee->name}}">
                </div>
                <div class="form-group">
                    <label> company </label>
                    <select class="form-select" aria-label="Default select example" name="company">
                        @foreach($companies as $company)
                            <option @if($company->id == $employee->company_id) "selected" @endif value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button class="text-success form-control" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
