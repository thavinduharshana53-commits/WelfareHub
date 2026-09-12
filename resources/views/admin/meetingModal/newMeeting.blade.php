<dialog id='meetingModal' class="w-full max-w-xl shadow-xl backdrop:bg-black/40 rounded-xl">
    <div class="p-5">
        <div class="flex justify-between py-2 border-b">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">
                    Create New Announcement
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                Create a new announcement to members.
                </p>
            </div>
            <div class="">
                <button
                    onclick="meetingModal.close()">
                    <svg width="24px" height="24px" viewBox="-9.92 -9.92 51.84 51.84" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-9.92" y="-9.92" width="51.84" height="51.84" rx="25.92" fill="#deddda" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#241f31;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.56;}</style> </defs> <title></title> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"></line> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"></line> </g> </g></svg>
                </button>
            </div>
        </div>

        <form method="POST" action="{{ route('meetings.store') }}">
            <x-label class="mt-3">Announcement Title</x-label>
            <x-input placeholder="e.g. Monthly General Meeting - September" name="title"></x-input>

            <div class="flex gap-4">
                <div class="w-1/2">
                    <x-label>Date</x-label>
                    <input  name="date" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date">
                </div>

                <div class="w-1/2">
                     <x-label>Time</x-label>
                     <input name="time" type="time" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div> 
            </div>

            <x-label class="mt-3">Venue / Location</x-label>
            <x-input name="venue" placeholder="e.g. Community Hall / Zoom Link"></x-input>

            <x-label class="mt-3">Description / Agenda</x-label>
            <x-textarea name="text" placeholder="Write the meeting goals, agenda, and other important instructions for members here..." rows="6"></x-textarea>

            <div class="flex items-center justify-end gap-3 pt-6 mt-4 border-t border-slate-200">
                <button
                onclick="feeModal.close()"
                    class="px-6 py-3 text-sm font-semibold transition duration-200 bg-white border rounded-lg cursor-pointer border-slate-300 text-slate-700 hover:bg-slate-50">CANCEL
                </button>
                <x-button>
                   Create Announcement
                </x-button>
            </div>  
        </form>
    </div>
</dialog>