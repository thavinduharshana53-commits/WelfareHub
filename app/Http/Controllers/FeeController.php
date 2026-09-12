<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Member;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $members = Member::all();
        $fees = Fee::paginate(6);
        return view('admin.feeRecords', compact('members', 'fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'memberName'=> 'required',
            'month' => 'required',
            'amount' => 'required',
            'method' => 'required'
        ]);

        Fee::create([
            'memberName' => $request->memberName,
            'month'=> $request->month,
            'amount'=> $request->amount,
            'method'=> $request->method
        ]);

        return redirect()
            ->route('feeRecords.index')
            ->with('success', 'Payment recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
