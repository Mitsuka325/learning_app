<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminClassController extends Controller
{
    public function create()
    {
        $grades = DB::table('classes')->select('grade')->distinct()->get();
        return view('admin_class_create');
    }
}
