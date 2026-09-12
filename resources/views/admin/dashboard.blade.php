@extends('layouts.admin')

@section('content')

    <div>
        @php
            $hour = now()->timezone('Asia/Colombo')->hour;

            if ($hour < 12) {
                $greeting = 'Good Morning';
            } elseif ($hour < 17) {
                $greeting = 'Good Afternoon';
            } else {
                $greeting = 'Good Evening';
            }
        @endphp

        <h1 class="text-3xl font-bold text-slate-900">
            {{ $greeting }},
            <span class="text-[#F97316]">
                {{ auth()->user()->name }}
            </span>
        </h1>

        <p class="text-[#617069] mt-2">Here’s what’s happening in your welfare society today.</p>
    <div>

    <div class="grid grid-cols-1 gap-2 mt-6 sm:grid-cols-2 sm:gap-5 xl:grid-cols-3">
        <x-admin.stateCard
        title="Total Members"
        txtColor="text-[#1F8C59]"
        :value="$members->count()"/>

        <x-admin.stateCard
        title="Fees Collected"
        txtColor="text-[#1A73C7]"
        :value="'LKR ' . $fees->sum('amount')"/>

        <x-admin.stateCard
        title="Next Meeting"
        txtColor="text-[#784DC7]"
        value="08 Aug"/>
    </div>

    <div class="grid grid-cols-1 gap-6 mt-8 xl:grid-cols-2">
        <div class="overflow-hidden bg-white border shadow-sm border-slate-200 rounded-2xl">
            <div class="px-5 py-5 border-b border-slate-200 sm:px-6">
                <h1 class="text-lg font-bold text-slate-900">Recent fee payments<h1>
                <span class="mt-1 text-s text-slate-500">Track the latest membership fee payments and their current status.</span>
            </div>
            @foreach ($fees as $fee)
                <x-admin.recentFee
                    :name="$fee->memberName"
                    :payment="$fee->amount"
                    :method="$fee->method"
                />
            @endforeach
        </div>

        <div class="overflow-hidden bg-white border shadow-sm border-slate-200 rounded-2xl">
            <div class="px-5 py-5 border-b border-slate-200 sm:px-6">
                <h1 class="text-lg font-bold text-slate-900">Recent Meetings<h1>
                <span class="mt-1 text-s text-slate-500">View upcoming meetings, schedules, locations, and agendas.</span>
            </div>

            @forelse ($meetings as $meeting )
            <x-admin.recentMonthlyMetting
            :title="$meeting->title"
            :date="$meeting->date"
            :time="$meeting->time"
            :location="$meeting->venue"
            :agenda="Str::limit($meeting->text, 50, '.....')"/> 
            @empty
                <div>Not yet Recent Meetings</div>
            @endforelse
        </div>
    </div>
@endsection