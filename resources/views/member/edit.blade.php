@extends('layouts.admin')
@section('content')
<div class="p-5 my-20 ml-[100px] bg-white shadow-2xl w-[850px] rounded-3xl">

    <div class="flex items-center justify-between">
        <a href="{{route('admin.membersAdd') }}" class="flex gap-2">
            <div class="bg-white border-2 rounded-full shadow-2xl ">
                <svg width="40px" height="40px" viewBox="-153.6 -153.6 819.20 819.20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5-a</title><polyline points="244 400 100 256 244 112" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"></polyline><line x1="120" y1="256" x2="412" y2="256" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"></line></g></svg>
            </div>
            <div class="flex items-center text-sm font-bold">Back to Members</div>
        </a>
        <p class="mt-4"><b>Updated at:</b> {{ $member->updated_at->diffForHumans() }}</p>
    </div>

    <div class="flex gap-12">
        <div>
            <div class="flex justify-center w-[350px] mt-10">
                <svg width="100px" height="100px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0">
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
            <div class="w-[175px] ml-[85px] mt-8">
                @if ($member->status == 'Active')
                    <p class=" flex items-center bg-[#E9F9F3] rounded-full">
                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 9.5C13.3807 9.5 14.5 10.6193 14.5 12C14.5 13.3807 13.3807 14.5 12 14.5C10.6193 14.5 9.5 13.3807 9.5 12C9.5 10.6193 10.6193 9.5 12 9.5Z" fill="#10B947"></path></g></svg>
                        <span class="text-[#16332A] text-s font-bold">Active Member</span>  
                    </p>
                @elseif ($member->status == 'Blocked')
                    <p class="flex items-center pr-2 bg-red-100 rounded-full">
                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 9.5C13.3807 9.5 14.5 10.6193 14.5 12C14.5 13.3807 13.3807 14.5 12 14.5C10.6193 14.5 9.5 13.3807 9.5 12C9.5 10.6193 10.6193 9.5 12 9.5Z" fill="#b91c1c"></path> </g></svg>
                        <span class="font-bold text-red-700 text-s">Inactive Member</span>  
                    </p>
                @endif
            </div>
        </div>

        <div class="flex justify-center p-5 w-[350px]">
            <form method="post" action="{{ route('member.update', $member) }}">
                @csrf
                @method('put')
                <div class="flex items-center">
                    <label class="w-[140px] font-semibold text-slate-700">Name: </label>
                    <input type="text" class="w-[300px] border border-slate-300 rounded-lg " name="name" value="{{ $member->name  }}">
                </div>
                <div class="flex items-center mt-5">
                    <label class="w-[140px] font-semibold text-slate-700">NIC Number: </label>
                    <input type="text" class="w-[300px] border border-slate-300 rounded-lg"  name="nic" value="{{ $member->nic_number  }}">
                </div>
                <div class="flex items-center mt-5">
                    <label class="w-[140px] font-semibold text-slate-700">Phone Number: </label>
                    <input type="text" class="w-[300px] border border-slate-300 rounded-lg"  name="phone" value="{{ $member->tel_number  }}">
                </div>

                <div class="flex items-center mt-5">
                    <label class="w-[140px] font-semibold text-slate-700">Address: </label>
                    <input type="text" class="w-[300px] border border-slate-300 rounded-lg " name="address" value="{{ $member->address  }}">
                </div>

                <div class="flex items-center mt-5">
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
    </div>
</div>
@endsection