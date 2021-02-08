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
                <h4>All companies</h4>
                <a href="{{route('company.create')}}" class="btn btn-success">Create new</a>
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <td colspan="2" class="table-active">Name</td>
                        <td>Creation Date</td>
                        <td>Operations</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$company->id}}</th>
                            <td colspan="2" class="table-active">{{$company->name}}</td>
                            <td>{{$company->created_at}}</td>
                            <td>
                                <a href="{{route('company.edit',['company'=>$company->id])}}">Edit</a>
                                <a href="{{route('company.destroy',['company'=>$company->id])}}">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                    <tr>
                        {{$companies->links()}}
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection