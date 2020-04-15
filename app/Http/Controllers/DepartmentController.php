<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DepartmentController extends Controller
{
    public function index() {
        $depts = db::select("SELECT * FROM Department");

        return view('department.index', compact('depts'));
    }
}
