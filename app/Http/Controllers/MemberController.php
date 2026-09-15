<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function store(Request $request){


       Member::create([
        'member_add' => Auth::id(),
        'name' => $request->name,
        'nic_number' => $request->nic,
        'tel_number' => $request->phone,
        'address' => $request->address,
       ]);

        return redirect()
            ->route('admin.membersAdd')
            ->with('success', 'member saved successfully!');
    }

    public function update(Request $request, Member $member)
    {

        $member->update([
            'name'=> $request->name,
            'nic_number'=> $request->nic,
            'tel_number'=> $request->phone,
            'address'=> $request->address,
            'status'=> $request->status
        ]);

        return redirect()
        ->route('admin.membersAdd')
        ->with('success', 'Member updated successfully!');
    }

    public function edit(Member $member)
    {
        return view('member.edit', ['member' => $member]);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()
        ->route('admin.membersAdd')
        ->with('success', 'Member Deleted successfully!');
    }
}
