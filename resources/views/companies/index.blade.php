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
                                <form method="post" action="{{route('company.destroy',['company'=>$company->id])}}">
                                    @csrf
                                    @method('delete')
                                    <div class="form-group">
                                        <button type="submit">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    <tr>
                        {{$companies->links()}}
                    </tr>
                    </tbody>
                </table>

            </div>
        </div><br>
        <div class="card">
            <div class="form-group">
                <label> Select company to view employees </label>
                <select class="form-select" aria-label="Default select example" id="selected-company">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
                <br>
                <table class="table table-dark ">
                    <thead>
                    <tr>
                        <th scope="row">Employee ID</th>
                        <td colspan="2" class="table-active"> Employee Name</td>
                        <td>Employee Creation Date</td>
                    </tr>
                    </thead>
                </table>
                <table class="table table-dark " id="employees-table">
                    <tbody id="employee-tbody">

                    </tbody>
                </table>

            </div>
        </div>


    </div>
@endsection
