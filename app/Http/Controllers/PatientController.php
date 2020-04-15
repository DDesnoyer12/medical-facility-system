<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use DB;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = DB::select("SELECT * FROM Patient, ZipCode, InsuranceType WHERE Patient.IID = InsuranceType.IID AND Patient.Zip = ZipCode.Zip");
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zips = DB::select(DB::raw("SELECT * FROM ZipCode"));
        $instypes = DB::select(DB::raw("SELECT * FROM InsuranceType"));
        
        return view('patient.create', compact('zips', 'instypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $PID = $request['patient_id'];
        $FName = $request['first_name'];
        $LName = $request['last_name'];
        $DoB = $request['date_of_birth'];
        $gender = $request['gender'];
        $phone = $request['phone'];
        $address = $request['address'];
        $zipcode = $request['zip_code'];
        $instype = $request['instype'];
        DB::insert("INSERT INTO Patient VALUES (?,?,?,?,?,?,?,?,?)",
            [$PID,
            $FName,
            $LName,
            $DoB,
            $gender,
            $phone,
            $address,
            $zipcode,
            $instype
        ]);
        $patients = DB::select("SELECT * FROM Patient, InsuranceType WHERE Patient.IID = InsuranceType.IID");
        return view("patient.index", compact('patients'));
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
        $patient = DB::select("SELECT * FROM Patient WHERE PID = ?", [$id])[0];
        $zips = DB::select("SELECT * FROM ZipCode");
        $insurance = DB::select("SELECT * FROM InsuranceType");
        return view('patient.edit', compact('patient', 'zips', 'insurance', 'id'));
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
        $instype = $request['instype'];
        DB::update("UPDATE Patient SET 
            FName = ?,
            LName = ?,
            DoB = ?,
            Gender = ?,
            Phone = ?,
            Address = ?,
            Zip = ?,
            IID = ?
            WHERE PID = ?
        ",
            [
            $FName,
            $LName,
            $DoB,
            $gender,
            $phone,
            $address,
            $zipcode,
            $instype,
            $id
        ]);
        $patients = DB::select("SELECT * FROM Patient, InsuranceType WHERE Patient.IID = InsuranceType.IID");
        return view("patient.index", compact('patients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM Patient WHERE PID = ?", [$id]);
        
        $patients = DB::select("SELECT * FROM Patient, InsuranceType WHERE Patient.IID = InsuranceType.IID");
        return view("patient.index", compact('patients'));
    }
}
