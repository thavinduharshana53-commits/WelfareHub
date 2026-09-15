@extends('layouts.admin')

@section('content')

    <div class="flex gap-60 bg-[#FFFFFF] p-5 rounded-xl shadow-lg">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Meeting Announcements</h1>
            <p class="text-[#617069] mt-2">Create and share notices with all members.</p>
        </div>

        <div>
            <x-button onclick="meetingModal.showModal()">+ New Announcement</x-button>
        </div>
    </div>

    @forelse ($meetings as $meeting)
   <div class="flex gap-60 bg-[#FFFFFF] p-5 w-1/2 rounded-xl mt-4 border-2">
        <div>
            <h1 class="py-2 text-2xl font-bold">{{ $meeting->title }}</h1>
            <div class="flex gap-4">
                <div class="flex gap-1">
                   <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#617069" stroke-width="0.21600000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C6 1.44772 6.44772 1 7 1C7.55228 1 8 1.44772 8 2V3H16V2C16 1.44772 16.4477 1 17 1C17.5523 1 18 1.44772 18 2V3H19C20.6569 3 22 4.34315 22 6V20C22 21.6569 20.6569 23 19 23H5C3.34315 23 2 21.6569 2 20V6C2 4.34315 3.34315 3 5 3H6V2ZM16 5V6C16 6.55228 16.4477 7 17 7C17.5523 7 18 6.55228 18 6V5H19C19.5523 5 20 5.44772 20 6V9H4V6C4 5.44772 4.44772 5 5 5H6V6C6 6.55228 6.44772 7 7 7C7.55228 7 8 6.55228 8 6V5H16ZM4 11V20C4 20.5523 4.44772 21 5 21H19C19.5523 21 20 20.5523 20 20V11H4Z" fill="#617069"></path> </g></svg>
                    <p class="text-[#617069]">{{ $meeting->date }}</p>
                </div>
                <div class="flex gap-1">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#617069" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p class="text-[#617069]">{{ $meeting->time }}</p>
                </div>

                <div class="flex gap-1">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#617069" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#617069" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p class="text-[#617069]">{{ $meeting->venue }}</p>
                </div>
            </div>
            <div class="w-full mt-3 mb-3">
                 <p>{{ Str::limit($meeting->text, 100, '....') }}</p>
            </div>
            <div class="border-t"></div>
            <div class="flex gap-5 pt-3">
                <a href="{{ route('meetings.edit', $meeting) }}" class="flex gap-1 hover:bg-[#F6F9F8] rounded-xl p-3">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#617069" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#617069" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p class="font-semibold text-[#617069] hover:text-black">Edit announcement</p>
                </a>
                <form action="{{ route('meetings.sms', $meeting->meeting_id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to send SMS to all active members?')">
                @csrf
                    <button class="flex gap-1 hover:bg-[#F6F9F8] rounded-xl p-3" >
                    <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:none;stroke:#617069;stroke-width:3.2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} </style> <line class="st0" x1="12" y1="14" x2="12" y2="14"></line> <line class="st0" x1="16" y1="14" x2="16" y2="14"></line> <line class="st0" x1="20" y1="14" x2="20" y2="14"></line> <path class="st0" d="M11,4c-4.4,0-8,3.6-8,8v12v5l0,0c3.7-3.2,8.4-5,13.3-5H21c4.4,0,8-3.6,8-8v-4c0-4.4-3.6-8-8-8H11z"></path> </g></svg>
                        <p class="font-semibold text-[#617069] hover:text-black">Send SMS reminder</p>
                    </button>
                </form>
                <form action="{{ route('meetings.destroy', $meeting) }} " method="POST">
                    @method('delete')
                    @csrf
                    <button class="flex items-center justify-center w-10 h-10 transition rounded-full text-rose-500 bg-rose-100 hover:bg-rose-200"
                        title="Delete" 
                        onclick="return confirm('Are you sure You want to delete this ?')">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.52381C3 6.12932 3.32671 5.80952 3.72973 5.80952H8.51787C8.52437 4.9683 8.61554 3.81504 9.45037 3.01668C10.1074 2.38839 11.0081 2 12 2C12.9919 2 13.8926 2.38839 14.5496 3.01668C15.3844 3.81504 15.4756 4.9683 15.4821 5.80952H20.2703C20.6733 5.80952 21 6.12932 21 6.52381C21 6.9183 20.6733 7.2381 20.2703 7.2381H3.72973C3.32671 7.2381 3 6.9183 3 6.52381Z" fill="#f43f5e"></path> <path d="M11.6066 22H12.3935C15.101 22 16.4547 22 17.3349 21.1368C18.2151 20.2736 18.3052 18.8576 18.4853 16.0257L18.7448 11.9452C18.8425 10.4086 18.8913 9.64037 18.4498 9.15352C18.0082 8.66667 17.2625 8.66667 15.7712 8.66667H8.22884C6.7375 8.66667 5.99183 8.66667 5.55026 9.15352C5.1087 9.64037 5.15756 10.4086 5.25528 11.9452L5.51479 16.0257C5.69489 18.8576 5.78494 20.2736 6.66513 21.1368C7.54532 22 8.89906 22 11.6066 22Z" fill="#f43f5e"></path> </g></svg>
                    </button>
                </form>
            </div>
        </div>
   </div>
    @empty
            <div>Not yet create Announcement</div>
    @endforelse

    {{ $meetings->links() }}
    
   @include('admin.meetingModal.newMeeting')

@endsection