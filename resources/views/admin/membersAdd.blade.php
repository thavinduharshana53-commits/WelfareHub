@extends('layouts.admin')

@section('content')
    <div class="flex gap-60 bg-[#FFFFFF] p-5 rounded-xl shadow-lg">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Members</h1>
            <p class="text-[#617069] mt-2">Manage registered welfare society members</p>
        </div>

        <div>
            <x-button onclick="memberModel.showModal()">+ Register Member</x-button>
        </div>

        @php
            $time = now()->timezone('Asia/Colombo')->format('h:i A');
        @endphp

        <div>
            <h1 class="text-2xl font-bold text-slate-900">{{ $time }}</h1>
        </div>


    </div>

    <div class="mt-8 bg-[#FFFFFF] p-5 border border-slate-300 w-1/2 rounded-xl">
        <form action="" method="">
            <div>
                <p class="mb-2 text-[#617069] font-bold text-lg">Search</p>
                <input type="text" name="search" class="w-[420px] border border-slate-300 pl-6 h-[42px] rounded-lg" placeholder="Search name, ID or phone">
            </div>
        </form>
    </div>

    <div class="w-full mt-8 overflow-x-auto bg-white border border-gray-200 shadow-sm rounded-2xl">
        <table class="w-full text-sm text-left">

            <thead class="text-base text-gray-500 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-semibold">Member ID</th>
                    <th class="px-6 py-4 font-semibold">Name</th>
                    <th class="px-6 py-4 font-semibold">Phone</th>
                    <th class="px-6 py-4 font-semibold">Joined</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 font-semibold">Actions</th>
                </tr>
            </thead>
                
            <tbody class="text-base">

                @foreach ( $members as $member)

                    <tr class="transition duration-200 hover:bg-gray-50">

                        <td class="px-6 py-5 text-gray-700">WM-{{  $member->memberId }}</td>
                        <td class="px-6 py-5 text-gray-700">{{  $member->name }}</td>
                        <td class="px-6 py-5 text-gray-600">{{  $member->tel_number }}</td>
                        <td class="px-6 py-5 text-gray-600">{{  $member->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-5">
                             @if( $member->status  == 'Active' )
                                <span class="inline-flex items-center px-3 py-1 font-medium text-green-700 bg-green-100 rounded-full text-s">
                                Active
                                 </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 font-medium text-red-700 bg-red-100 rounded-full text-s">
                                Inactive
                                 </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center justify-between gap-3">

                                <!-- Edit -->
                                <button
                                    class="flex items-center justify-center w-10 h-10 text-teal-600 transition bg-teal-100 rounded-full hover:bg-teal-200"
                                    title="Edit">
                                    <a href="{{ route('member.edit', $member) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="w-6 h-6"
                                            fill="currentColor">

                                            <path
                                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25Zm17.71-10.04a.996.996 0 0 0 0-1.41l-2.51-2.51a.996.996 0 0 0-1.41 0l-1.96 1.96 3.75 3.75 2.13-1.79Z" />
                                        </svg>
                                    </a>
                                </button>
                                  {{-- @include('admin.memberModel.editBtn') --}}


                                <!-- Delete -->
                                <form action={{ route('member.destroy', $member) }} method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="flex items-center justify-center w-10 h-10 transition rounded-full text-rose-500 bg-rose-100 hover:bg-rose-200"
                                        title="Delete" 
                                        onclick="return confirm('Are you sure You want to delete this ?')">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6.52381C3 6.12932 3.32671 5.80952 3.72973 5.80952H8.51787C8.52437 4.9683 8.61554 3.81504 9.45037 3.01668C10.1074 2.38839 11.0081 2 12 2C12.9919 2 13.8926 2.38839 14.5496 3.01668C15.3844 3.81504 15.4756 4.9683 15.4821 5.80952H20.2703C20.6733 5.80952 21 6.12932 21 6.52381C21 6.9183 20.6733 7.2381 20.2703 7.2381H3.72973C3.32671 7.2381 3 6.9183 3 6.52381Z" fill="#f43f5e"></path> <path d="M11.6066 22H12.3935C15.101 22 16.4547 22 17.3349 21.1368C18.2151 20.2736 18.3052 18.8576 18.4853 16.0257L18.7448 11.9452C18.8425 10.4086 18.8913 9.64037 18.4498 9.15352C18.0082 8.66667 17.2625 8.66667 15.7712 8.66667H8.22884C6.7375 8.66667 5.99183 8.66667 5.55026 9.15352C5.1087 9.64037 5.15756 10.4086 5.25528 11.9452L5.51479 16.0257C5.69489 18.8576 5.78494 20.2736 6.66513 21.1368C7.54532 22 8.89906 22 11.6066 22Z" fill="#f43f5e"></path> </g></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>

        </table>
    </div>
    <div class="mt-5">{{ $members->links() }}</div>

    @include('admin.memberModel.registerAddBtn')
  

@endsection