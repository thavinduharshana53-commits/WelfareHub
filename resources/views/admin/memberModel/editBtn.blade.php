<dialog id = "editModal{{ $member->memberId }}" class="w-full max-w-lg p-0 shadow-2xl backdrop:bg-black/40 rounded-xl" >
    <div class="p-4">
        <div class="flex justify-end">
                <button onclick="editModal{{ $member->memberId  }}.close()">
                    <svg width="34px" height="34px" viewBox="-9.92 -9.92 51.84 51.84" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-9.92" y="-9.92" width="51.84" height="51.84" rx="25.92" fill="#deddda" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#241f31;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.56;}</style> </defs> <title></title> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"></line> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"></line> </g> </g></svg>
                </button>
        </div>
        
        <div class="flex justify-center">
            <svg width="64px" height="64px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0">
                <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#99f6e4" strokewidth="0"></rect>
                </g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                </g><g id="SVGRepo_iconCarrier"> <g id="style=fill"> <g id="profile"> 
                <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z" fill="#0d9488"></path> 
                <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z" fill="#0d9488"></path>
                </g> </g> </g>
            </svg>
        </div>
        <h1 class="flex justify-center mt-4 text-2xl font-bold">{{ $member->name }}</h1>
        <p class="flex justify-center">Member ID: M0{{ $member->memberId }}</p>
    </div>

    <div class="flex justify-center p-5">
        <form method="post" action="{{ route('admin.members.update', $member->memberId) }}">
            @csrf
            @method('patch')
            <div class="flex items-center">
                <label class="w-[140px] font-semibold text-slate-700">Name: </label>
                <input type="text" class="w-[300px] border border-slate-300 rounded-lg " name="name" value="{{ $member->name  }}">
            </div>
            <div class="flex items-center pt-3">
                <label class="w-[140px] font-semibold text-slate-700">NIC Number: </label>
                <input type="text" class="w-[300px] border border-slate-300 rounded-lg"  name="nic" value="{{ $member->nic_number  }}">
            </div>
            <div class="flex items-center pt-3">
                <label class="w-[140px] font-semibold text-slate-700">Phone Number: </label>
                <input type="text" class="w-[300px] border border-slate-300 rounded-lg"  name="phone" value="{{ $member->tel_number  }}">
            </div>

            <div class="flex items-center pt-3">
                <label class="w-[140px] font-semibold text-slate-700">Address: </label>
                <input type="text" class="w-[300px] border border-slate-300 rounded-lg " name="address" value="{{ $member->address  }}">
            </div>

            <div class="flex items-center pt-3">
                <label class="w-[140px] font-semibold text-slate-700">Status: </label>
            
                <select name="status" class="w-[300px] border border-slate-300 rounded-lg ">
                    <option value="" disabled>Select Action</option>
                    <option value="active"
                        {{ $member->status == 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="blocked"
                        {{ $member->status == 'blocked' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <div class="flex justify-end gap-5 pt-6">

                <button type="submit" 
                        class="px-6 py-3 bg-[#0C2F23] text-white text-sm font-semibold rounded-lg cursor-pointer shadow-sm hover:bg-[#123f30] hover:shadow-md transition duration-200">
                        Save Member
                </button>
            </div>
            
        </form>
    </div>
</dialog>