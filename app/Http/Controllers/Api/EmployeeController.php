<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EmployeeCollection(Employee::orderBy('id','DESC')->paginate(5));
    }
    public function search($field,$query)
    {
       $query= trim($query);
        return new EmployeeCollection(Employee::where($field,'LIKE',"%$query%")->orderBy('id','DESC')->paginate(5));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);
        $db_employee = new Employee();
        $db_employee->name = $request->name;
        $db_employee->designation = $request->designation;
        $db_employee->email = $request->email;
        $db_employee->phone = $request->phone;
        $db_employee->address = $request->address;
        $db_employee->total = 22;
        $db_employee->save();
        return new EmployeeResource($db_employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
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
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'phone' => 'required|numeric',
            'address' => 'required',

        ]);
        $db_employee =  Employee::findOrfail($id);
        $db_employee->name = $request->name;
        $db_employee->designation = $request->designation;
        $db_employee->email = $request->email;
        $db_employee->phone = $request->phone;
        $db_employee->address = $request->address;
        $db_employee->total = 22;
        $db_employee->save();
        return new EmployeeResource($db_employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db_employee =  Employee::findOrfail($id);
        $db_employee->delete();
        return new EmployeeResource($db_employee);
    }
}
