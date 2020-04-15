<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inpatient;
use DB;
class InpatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inpatients = DB::select("SELECT InpatientNo, Inpatient.PID, AcceptanceDate, DischargeDate, FName, LName FROM Inpatient, Patient WHERE Inpatient.PID = Patient.PID");
        return view('inpatient.index', compact('inpatients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inpatient = DB::select("SELECT * FROM Inpatient WHERE InpatientNo = ?", [$id])[0];
        $patientinfo = DB::select("SELECT FName, LName FROM Patient WHERE PID = ?", [$inpatient->PID])[0];
        $roominfo = DB::select("SELECT * FROM RoomAssignment WHERE InpatientNo = ?", [$id])[0];
        $iteminfo = DB::select("SELECT * FROM MedicalItemAssignment, MedicalItem WHERE MedicalItem.ItemID = MedicalItemAssignment.ItemID AND InpatientNo = ?", [$id]);

        return view('inpatient.show', compact('inpatient', 'patientinfo', 'roominfo', 'iteminfo'));
    }

    public function create() {
        $next_no = DB::select("SELECT MAX(InpatientNo)+1 AS num FROM Inpatient")[0];
        $patients = DB::select("SELECT * FROM Patient");
        $rooms = DB::select("SELECT * FROM Room");
        $medicalitems = DB::select("SELECT * FROM MedicalItem");
        return view('inpatient.create', compact('next_no', 'patients', 'rooms', 'medicalitems'));
    }

    public function insert(Request $request) {
        $inpatientno = $request['inpatient_no'];
        $patientid = $request['pid'];
        $accepteddate = $request['acceptance_date'];
        $discharged = $request['discharged_date'];
        $room = $request['room'];
        $meditem = $request['meditem'];
        if($discharged != NULL) {
            DB::insert("INSERT INTO Inpatient VALUES (?, ?, ?, ?)", 
            [$inpatientno, $patientid, $accepteddate, $discharged]
        );
        } else {
            DB::insert("INSERT INTO Inpatient (InpatientNo, PID, AcceptanceDate) VALUES(?,?,?)",
                [$inpatientno, $patientid, $accepteddate]
        );
        }
        if($room != "") {
            DB::insert("INSERT INTO RoomAssignment VALUES(?,?)", [$room, $inpatientno]);
        }
        if($meditem != "") {
            DB::insert("INSERT INTO MedicalItemAssignment VALUES(?,?)", [$meditem, $inpatientno]);
        }
        $inpatients = DB::select("SELECT InpatientNo, Inpatient.PID, AcceptanceDate, DischargeDate, FName, LName FROM Inpatient, Patient WHERE Inpatient.PID = Patient.PID");
        return view('inpatient.index', compact('inpatients'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inpatientinfo = DB::select("SELECT Inpatient.InpatientNo, Inpatient.PID, AcceptanceDate, DischargeDate, FName, LName, RoomAssignment.RID, Department 
        FROM Inpatient, Patient, RoomAssignment, Room 
        WHERE Inpatient.PID = Patient.PID AND RoomAssignment.InpatientNo = Inpatient.InpatientNo AND RoomAssignment.RID = Room.RID AND Inpatient.InpatientNo = ?", [$id])[0];
        // $patientinfo = DB::select("SELECT FName, LName FROM Patient WHERE PID = ?", [$inpatient->PID])[0];
        // $inpatientroom = DB::select("SELECT * FROM RoomAssignment WHERE InpatientNo = ?", [$id])[0];
        $iteminfo = DB::select("SELECT * FROM MedicalItemAssignment, MedicalItem WHERE MedicalItem.ItemID = MedicalItemAssignment.ItemID AND InpatientNo = ?", [$id]);
        $medicalitems = DB::select("SELECT * FROM MedicalItem");
        $rooms = DB::select("SELECT * FROM Room");
        return view('inpatient.edit', compact('inpatientinfo', 'iteminfo', 'medicalitems', 'rooms', 'id'));
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
        $discharged = $request['discharged_date'];
        $room = $request['room'];
        $medicalitem = $request['meditem'];
        if($discharged != NULL) {
            DB::update("UPDATE Inpatient SET
            DischargeDate = ?
            WHERE InpatientNo = ?    
        ", [$discharged, $id]);
        }
        DB::update("UPDATE RoomAssignment SET
        RID = ? WHERE InpatientNo = ?", [$room, $id]);
        if($medicalitem != "none") {
            DB::insert("INSERT INTO MedicalItemAssignment VALUES (?, ?)", [$medicalitem, $id]);
        }

        $inpatients = DB::select("SELECT InpatientNo, Inpatient.PID, AcceptanceDate, DischargeDate, FName, LName FROM Inpatient, Patient WHERE Inpatient.PID = Patient.PID");
        return view('inpatient.index', compact('inpatients'));
    }
}
