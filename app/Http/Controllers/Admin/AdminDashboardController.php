<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Meeting;
use App\Models\Member;

class AdminDashboardController extends Controller
{
    public function index(){

        $fees = Fee::all();
        $members = Member::all();
        $meetings = Meeting::all();


        return view('admin.dashboard', compact('fees', 'members', 'meetings'));
    }
}
