<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body  class="m-0 overflow-y-auto bg-[#fcf8f9] text-slate-900">
    <div>
        <aside class="fixed inset-y-0 left-0 z-50 flex w-[260px] flex-col
               bg-[#0C2F23] text-white shadow-2xl
               transition-transform duration-300 lg:translate-x-0">

                {{-- Logo --}}
                <div class="flex items-center h-[80px] px-5 mt-6 pb-5 border-b border-gray-100">
                    <div class="flex items-center gap-3 py-8">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="AgroSmart Logo"
                            class="object-contain w-20 h-20">

                        <div class="leading-tight">

                            <h1 class="text-2xl font-bold leading-none text-white">
                             Welfare<span class="text-[#EA580C]">Hub</span>
                            </h1>

                            <p class="mt-1 text-sm leading-none text-white">
                                Administration
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Navigation --}}
                <nav class="flex-1 px-4 py-8 space-y-3 overflow-y-auto">

                    {{-- Dashboard --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-white  
                        {{ request()->routeIs('admin.dashboard') ? 
                        'bg-emerald-500 text-white shadow-lg shadow-emerald-950/30' : 
                        'text-slate-300 hover:bg-[#114130] hover:text-[#EA580C]'}}">
                                    
                        <svg
                            class="w-5 h-5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24">

                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                         </svg>

                        Dashboard
                    </a> 
                    
                    {{-- Members --}}
                    <a 
                        href="{{ route('admin.membersAdd')}}"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-white
                        {{request()->routeIS('admin.membersAdd') ? 
                        'bg-emerald-500 text-white shadow-lg shadow-emerald-950/30'
                        :'text-slate-300 hover:bg-[#114130] hover:text-[#EA580C]'}}">

                        <svg
                            class="w-5 h-5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>

                            <circle cx="9" cy="7" r="4"/>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 8v6M16 11h6"/>
                        </svg>
                        Members
                    </a>

                    {{-- Fee Records --}}
                    <a 
                        href="{{ route('feeRecords.index') }}"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-white 
                         {{ request()->routeIS('admin.feeRecords') ?
                         'bg-emerald-500 text-white shadow-lg shadow-emerald-950/30'
                        : 'text-slate-300 hover:bg-[#114130] hover:text-[#EA580C]' }}">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-6 h-6"
                            aria-hidden="true"
                        >
                            <!-- Calendar -->
                            <rect x="3" y="4.5" width="15" height="15.5" rx="2.5" />
                            <path d="M7 2.5v4M14 2.5v4M3 9h15" />

                            <!-- Fee/payment coin -->
                            <circle cx="17.5" cy="16.5" r="4" fill="currentColor" stroke="none" />
                            <path
                                d="M17.5 14.3v4.4M16.2 15.2h2a.8.8 0 0 1 0 1.6h-1.4a.8.8 0 0 0 0 1.6h2"
                                stroke="white"
                                stroke-width="1"/>
                        </svg>
                        Fee Records
                    </a>

                    {{-- Meetings --}}
                    <a 
                        href="{{ route('meetings.index') }}"
                        class=" flex items-center gap-3 px-4 py-3.5 rounded-xl text-white 
                        {{ request()->routeIS('admin.meetings') ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-950/30' : 'text-slate-300 hover:bg-[#114130] hover:text-[#EA580C]'}}">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-6 h-6 shrink-0"
                            aria-hidden="true">
                            
                            <!-- Centre person -->
                            <circle cx="12" cy="7" r="3" />
                            <path d="M6.5 20v-1.5A5.5 5.5 0 0 1 12 13a5.5 5.5 0 0 1 5.5 5.5V20" />

                            <!-- Left person -->
                            <circle cx="4.5" cy="9" r="2" />
                            <path d="M1 18v-1a4 4 0 0 1 4-4" />

                            <!-- Right person -->
                            <circle cx="19.5" cy="9" r="2" />
                            <path d="M23 18v-1a4 4 0 0 0-4-4" />
                        </svg>
                        Meetings
                    </a>

                    {{-- logout --}}
                    <div  class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold transition 'text-slate-300 hover:bg-[#114130] hover:text-red-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="w-6 h-6 shrink-0"
                            aria-hidden="true">
                            
                            <path d="M10 17l5-5-5-5" />
                            <path d="M15 12H3" />
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        </svg>

                        <form method="POST" action="{{ route('logout')}}">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                    
                    <div>
                </nav>       
        </aside>
        
        {{-- Page Content --}}
        <main class="ml-[300px] min-h-screen bg-[#F8FAFC] p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>

        @if(session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                background: '#0C2F23',
                color: '#ffffff',
                timer: 3500,
                timerProgressBar: true
            });
        </script>
        @endif
        
    </div>
</body>
</html>