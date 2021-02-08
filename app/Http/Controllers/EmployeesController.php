<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::paginate(10);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create',['companies'=>Company::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'company'=>'required',
        ]);
        $newCompany = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('password'),
            'company_id'=>$request->company,
            'created_at'=>Carbon::now(),
        ]);
        if(!$newCompany){
            Session::flash('alert-danger','Error creating company');
        }
        Session::flash('alert-success','company created successfully');
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employees.edit',[
            'employee'=>User::find($id),
            'companies'=>Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'company'=>'required',
        ]);
        $newCompany = User::where('id','=',$id)->update([
            'name'=>$request->name,
            'company_id'=>$request->company,
            'created_at'=>Carbon::now(),
        ]);
        if(!$newCompany){
            Session::flash('alert-danger','Error updating employee');
        }
        Session::flash('alert-success','Employee updated successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id','=',$id)->delete();
        return redirect()->route('employee.index');
    }
}
