<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AppointmentController extends Controller
{
    public function index() {

        $appts = DB::select("SELECT AID, ApptNote, Appointment.PID, Appointment.EID, Patient.FName as PFName, Patient.LName as PLName, Employee.FName as EFName, Employee.LName as ELName,
        Appointment.TimeslotID, Timeslot.Dayofweek, Timeslot.TimeStart, Appointment.Day FROM Appointment, Patient, Physician, Employee, Timeslot WHERE Physician.EID = Employee.EID AND Appointment.PID = Patient.PID AND Appointment.EID = Physician.EID AND Appointment.TimeslotID = Timeslot.TimeslotID");

        return view("appointment.index", compact('appts'));

    }

    public function create() {
        $patients = DB::select("SELECT * FROM Patient");
        $physicians = DB::select("SELECT * FROM Physician, Employee WHERE Physician.EID = Employee.EID");
        $opentimeslots = DB::select("SELECT * FROM Timeslot T WHERE NOT EXISTS (SELECT * FROM Appointment WHERE Appointment.TimeslotID = T.TimeslotID AND Appointment.Day >= GETDATE())");

        return view('appointment.create', compact('patients', 'physicians', 'opentimeslots'));
    }

    public function insert(Request $request) {
        $pid = $request['pid'];
        $eid = $request['eid'];
        $tid = $request['tid'];
        $note = $request['note'];
        $next_num = DB::select("SELECT MAX(AID)+1 as num FROM Appointment")[0];
        DB::insert("INSERT INTO Appointment (AID, TimeslotID, Day, EID, PID, ApptNote) VALUES (?,?, GETDATE(), ?,?,?)",
            [$next_num->num, $tid, $eid, $pid, $note]
    );
    $appts = DB::select("SELECT AID, ApptNote, Appointment.PID, Appointment.EID, Patient.FName as PFName, Patient.LName as PLName, Employee.FName as EFName, Employee.LName as ELName,
    Appointment.TimeslotID, Timeslot.Dayofweek, Timeslot.TimeStart, Appointment.Day FROM Appointment, Patient, Physician, Employee, Timeslot WHERE Physician.EID = Employee.EID AND Appointment.PID = Patient.PID AND Appointment.EID = Physician.EID AND Appointment.TimeslotID = Timeslot.TimeslotID");

    return view("appointment.index", compact('appts'));
    }
}
