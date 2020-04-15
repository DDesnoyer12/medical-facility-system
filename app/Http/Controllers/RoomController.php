<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RoomController extends Controller
{
    public function index() {
        $rooms = DB::select("SELECT * FROM Room");

        return view('room.index', compact("rooms"));
    }
}
