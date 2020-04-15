<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select("SELECT * FROM Employee");
        $physicians = DB::select("SELECT * FROM Physician, Employee WHERE Physician.EID = Employee.EID");
        return view('employee.index', compact('employees', 'physicians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zips = DB::select(DB::raw("SELECT * FROM ZipCode"));
        $depts = DB::select(DB::raw("SELECT * FROM Department"));
        
        return view('employee.create', compact('zips', 'depts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $EID = $request['employee_id'];
        $FName = $request['first_name'];
        $LName = $request['last_name'];
        $DoB = $request['date_of_birth'];
        $gender = $request['gender'];
        $phone = $request['phone'];
        $address = $request['address'];
        $zipcode = $request['zip_code'];
        $dept = $request['department'];
        $emptype = $request['emptype'];
        DB::insert("INSERT INTO Employee VALUES (?,?,?,?,?,?,?,?,?,?)",
            [$EID,
            $FName,
            $LName,
            $DoB,
            $gender,
            $phone,
            $address,
            $zipcode,
            $dept,
            $emptype
        ]);
        if($emptype == "Physician") {
            $license_no = $request["license_no"];
            $specialty = $request["specialty"];
            DB::insert("INSERT INTO Physician VALUES (?,?,?)",
                [$EID,
                $license_no,
                $specialty
            ]);
        }
        $employees = DB::select("SELECT * FROM Employee");
        $physicians = DB::select("SELECT * FROM Physician, Employee WHERE Physician.EID = Employee.EID");
        return view('employee.index', compact('employees', 'physicians'));
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
        $employee = DB::select("SELECT * FROM Employee WHERE EID = ?", [$id])[0];

        $zips = DB::select(DB::raw("SELECT * FROM ZipCode"));
        $depts = DB::select(DB::raw("SELECT * FROM Department"));

        if($employee->Employee_Type == "Physician") {
            $physician = DB::select("SELECT * FROM Physician WHERE EID = ?", [$id])[0];
            return view('employee.edit', compact('employee', 'physician', 'zips', 'depts', 'id'));
        }
        
        return view('employee.edit', compact('employee', 'zips', 'depts', 'id'));
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
        $FName = $request['first_name'];
        $LName = $request['last_name'];
        $DoB = $request['date_of_birth'];
        $gender = $request['gender'];
        $phone = $request['phone'];
        $address = $request['address'];
        $zipcode = $request['zip_code'];
        $dept = $request['department'];
        $emptype = $request['emptype'];

        DB::update("UPDATE Employee SET
            FName = ?,
            LName = ?,
            DoB = ?,
            Gender = ?,
            Phone = ?,
            Address = ?,
            Zip = ?,
            Department = ?,
            Employee_Type = ?
            WHERE EID = ?
        ",
            [
            $FName,
            $LName,
            $DoB,
            $gender,
            $phone,
            $address,
            $zipcode,
            $dept,
            $emptype,
            $id
        ]);
        if($emptype == "Physician") {
            $license_no = $request["license_no"];
            $specialty = $request["specialty"];
            DB::update("UPDATE Physician SET
                LicenseNo = ?,
                Specialty = ?
                WHERE EID = ?
            ",[
                $license_no,
                $specialty,
                $id
            ]);
        }
        $employees = DB::select("SELECT * FROM Employee");
        $physicians = DB::select("SELECT * FROM Physician, Employee WHERE Physician.EID = Employee.EID");
        return view('employee.index', compact('employees', 'physicians'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM Employee WHERE EID = ?", [$id]);
        
        $employees = DB::select("SELECT * FROM Employee");
        $physicians = DB::select("SELECT * FROM Physician, Employee WHERE Physician.EID = Employee.EID");
        return view('employee.index', compact('employees', 'physicians'));
    }
}
