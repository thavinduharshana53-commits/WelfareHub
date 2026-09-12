<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetings = Meeting::paginate(4);
        return view('admin.meetings', compact('meetings'));
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
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'venue' => 'required',
            'text' => 'required'
        ]);

        Meeting::create([
            'title'=> $request->title,
            'date'=> $request->date,
            'time'=> $request->time,
            'venue'=> $request->venue,
            'text'=> $request->text
        ]);

        return redirect()
            ->route('meetings.index')
            ->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        //
    }

   public function sms(Meeting $meeting)
    {
        $members = Member::where('status', 'active')->get();

        if ($members->isEmpty()) {
            return back()->with('error', 'No active members found.');
        }

        $numbers = $members->pluck('tel_number')
            ->map(function ($phone) {

                $phone = preg_replace('/\D/', '', $phone);

                // 0752025500 -> 94752025500
                if (str_starts_with($phone, '0')) {
                    $phone = '94' . substr($phone, 1);
                }

                return $phone;
            })
            ->implode(',');

        $message = "WelfareHub Reminder\n"
            . $meeting->title . "\n"
            . "Date: " . $meeting->date . "\n"
            . "Time: " . $meeting->time . "\n"
            . "Venue: " . $meeting->venue;

        $response = Http::withToken(env('TEXTLK_API_TOKEN'))
            ->acceptJson()
            ->post('https://app.text.lk/api/v3/sms/send', [
                'recipient' => $numbers,
                'sender_id' => env('TEXTLK_SENDER_ID'),
                'type' => 'plain',
                'message' => $message,
            ]);

        if ($response->successful()) {
            return back()->with(
                'success',
                'SMS reminders sent successfully!'
            );
        }

        return back()->with(
            'error',
            'Failed to send SMS reminders.'
        );
    }
}
