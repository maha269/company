@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            @foreach(Session::get('message') as $class => $message)
                <p class="alert {{ $class}}">{{$message}}</p>
            @endforeach
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>All employees</h4>
                <a href="{{route('employee.create')}}" class="btn btn-success">Create new</a>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <td colspan="2" class="table-active">Name</td>
                        <td colspan="2" class="table-active">Company</td>
                        <td>Creation Date</td>
                        <td>Operations</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td colspan="2" class="table-active">{{$employee->name}}</td>
                            <td colspan="2" class="table-active">{{$employee->company->name}}</td>
                            <td>{{$employee->created_at}}</td>
                            <td>
                                <a href="{{route('employee.edit',['employee'=>$employee->id])}}">Edit</a>
                                <form method="post" action="{{route('employee.destroy',['employee'=>$employee->id])}}">
                                    @csrf
                                    @method('delete')
                                    <div class="form-group">
                                        <button type="submit">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
