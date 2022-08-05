<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Employee;

class ApiController extends Controller
{
    //creating employee -POST
    public function createEmployee(Request $request)
    {
       //Validating data
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:employees',
        'phone'=>'required',
        'gender'=>'required',
        'age'=>'required'
       ]);
       //Saving data 
       $employee = new Employee();
       $employee->name=$request->name;
       $employee->email=$request->email;
       $employee->phone=$request->phone;
       $employee->gender=$request->gender;
       $employee->age=$request->age;

       $employee->save();

       //Sending responce
       return response()->json([
        "status"=>1,
        "message"=>"Employee added successfully"
       ]);
    }
    //Retreaving All employees
    public function listEmployees()
    {
        $employees = Employee::all();
        return response()->json([
            $employees
        ]);
    }
    //Retreaving single/details of employee
    public function singleEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            $employee
        ]);
    }
    //Updating employee
    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees',
            'phone'=>'required',
            'gender'=>'required',
            'age'=>'required'
           ]);
           $employees = Employee::findOrFail();
        //    $employee->update($request->all());
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->gender=$request->gender;
        $employee->age=$request->age;
 
        $employee->update();
        return response()->json([
            "status"=>1,
            "message"=>"Employee updated successfully"
        ]);
    }
    //Deleting employee
    public function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json([
            "message"=>"Employee removed successfully"
        ]);
    }
}
