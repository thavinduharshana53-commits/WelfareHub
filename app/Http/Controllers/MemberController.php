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

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $data = $request->only([
            'name',
            'nic_number',
            'tel_number',
            'address',
            'status'
        ]);

        $data = array_filter($data, function ($value) {
            return $value !== null && $value !== '';
        });

        $member->update($data);

        return redirect()
        ->route('admin.membersAdd')
        ->with('success', 'Member updated successfully!');
    }
}
