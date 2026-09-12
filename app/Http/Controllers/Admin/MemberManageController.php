<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberManageController extends Controller
{
    public function index(){

        $memberid = Auth::id();
        $members = Member::paginate(4);
        return view('admin.membersAdd', compact('members'));
    }
}
