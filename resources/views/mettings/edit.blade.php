@extends('layouts.admin')
@section('content')
    <div class="p-5 ml-[120px] w-[850px] bg-white shadow-2xl rounded-3xl">

        <div class="flex items-center justify-between mb-3">
            <a href="{{ route('meetings.index') }}" class="flex gap-2">
                <div class="bg-white border-2 rounded-full shadow-2xl ">
                    <svg width="40px" height="40px" viewBox="-153.6 -153.6 819.20 819.20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5-a</title><polyline points="244 400 100 256 244 112" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"></polyline><line x1="120" y1="256" x2="412" y2="256" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"></line></g></svg>
                </div>
                <div class="flex items-center text-sm font-bold">Back to Meetings</div>
            </a>
            <p class="mt-4"><b>Updated at:</b> {{ $meeting->updated_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-between py-2 border-b">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">
                    Edit Announcement
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                </p>
            </div>
        </div>

        <form action={{ route('meetings.update', $meeting) }} method="POST">
            @method('put')
            @csrf
            <x-label class="mt-3">Announcement Title</x-label>
            <x-input Value="{{ $meeting->title }}" name="title"></x-input>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <x-label>Date</x-label>
                    <input  name="date" Value="{{ $meeting->date }}"  class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date">
                </div>

                <div class="w-1/2">
                    <x-label>Time</x-label>
                    <input name="time" type="time" Value="{{ $meeting->time }}"  class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div> 
            </div>

            <x-label class="mt-3">Venue / Location</x-label>
            <x-input name="venue" Value="{{ $meeting->venue }}" ></x-input>

            <x-label class="mt-3">Description / Agenda</x-label>
            <x-textarea name="text" Value="{{ $meeting->text}}"  placeholder="Write the meeting goals, agenda, and other important instructions for members here..." rows="6"></x-textarea>

            <div class="flex items-center justify-end gap-3 pt-6 mt-4 border-t border-slate-200">
                <x-button>
                Save Changes
                </x-button>
            </div> 
        </form>
    </div>
@endsection
