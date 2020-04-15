<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MedicalItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select("SELECT * FROM MedicalItem");
        return view('medicalitem.index', compact('items'));
    }

    public function create() {

        $next_no = DB::select("SELECT MAX(ItemID)+1 AS num FROM MedicalItem")[0];
        return view('medicalitem.create', compact('next_no'));

    }

    public function edit($id) {
        $item = DB::select("SELECT * FROM MedicalItem WHERE ItemID = ?",[$id])[0];
        return view('medicalitem.edit', compact("item", "id"));
    }

    public function update(Request $request, $id) {
        $name = $request['item_name'];;
        $description = $request['description'];
        DB::update("UPDATE MedicalItem SET Name = ?, Description = ? WHERE ItemID = ?",[$name, $description, $id]);
        $items = DB::select("SELECT * FROM MedicalItem");
        return view('medicalitem.index', compact('items'));
    }
    
    public function insert(Request $request) {

        $itemid = $request["item_id"];
        $itemname = $request["item_name"];
        $itemdesc = $request["item_description"];

        DB::insert("INSERT INTO MedicalItem VALUES (?, ?, ?)", 
        [
            $itemid, $itemname, $itemdesc
        ]);

        $items = DB::select("SELECT * FROM MedicalItem");
        return view('medicalitem.index', compact('items'));

    }
}
