
<dialog id="memberModel" class="w-full max-w-xl p-0 shadow-xl rounded-2xl backdrop:bg-black/40">
    <div class="flex items-center justify-between p-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-900">
                Add Members
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Fill in the details below to register a new member.
            </p>
        </div>

        <div>
            <button
               onclick="memberModel.close()"
               class="inline-flex items-center px-5 py-2.5 font-semibold text-lg rounded-lg border border-slate-200 hover:bg-slate-50">
                <svg width="14px" height="14px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-case" fill="#000000" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
            </button>
        </div>

    </div>

    <div class="max-w-3xl bg-white border shadow-sm border-slate-200 rounded-2xl">

        <form method="POST" action="{{ route('admin.members.store') }}" class="p-8">
            @csrf

            <div>
                <label for="name"
                       class="block mb-2 text-sm font-semibold text-slate-700">
                    Full Name
                </label>

                <input type="text"
                       required
                       id="name"
                       name="name"
                       placeholder="Enter member's full name"
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-700 placeholder-slate-400 outline-none focus:border-[#0C2F23] focus:ring-2 focus:ring-[#0C2F23]/20 transition">
            </div>

            @error('name')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror


            <div class="mt-6">
                <label for="NIC" class="block mb-2 text-sm font-semibold text-slate-700">
                    NIC Number
                </label>

                <input type="text" required id="NIC" placeholder="Enter NIC number"
                    name="nic"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-700 placeholder-slate-400 outline-none focus:border-[#0C2F23] focus:ring-2 focus:ring-[#0C2F23]/20 transition">
            </div>

            @error('nic')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror


            <!-- Phone -->
            <div class="mt-6">
                <label for="Phone"
                       class="block mb-2 text-sm font-semibold text-slate-700">
                    Phone Number
                </label>

                <input type="text"
                       required
                       id="Phone"
                       name="phone"
                       placeholder="Enter phone number"
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-700 placeholder-slate-400 outline-none focus:border-[#0C2F23] focus:ring-2 focus:ring-[#0C2F23]/20 transition">
            </div>

            @error('phone')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror


            <!-- Address -->
            <div class="mt-6">
                <label for="Address"
                       class="block mb-2 text-sm font-semibold text-slate-700">
                    Address
                </label>

                <input type="text"
                       required
                       id="Address"
                       name="address"
                       placeholder="Enter member's address"
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-700 placeholder-slate-400 outline-none focus:border-[#0C2F23] focus:ring-2 focus:ring-[#0C2F23]/20 transition">
            </div>

            @error('address')
                <div class="text-red-700 ">{{ $message }}</div>
            @enderror


            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3 pt-6 mt-8 border-t border-slate-200">

                <button
                    onclick="memberModel.close()"
                    class="px-6 py-3 text-sm font-semibold transition duration-200 bg-white border rounded-lg cursor-pointer border-slate-300 text-slate-700 hover:bg-slate-50">CANCEL
                </button>

                <x-button>
                        Save Member
                </x-button>
            </div>    
        </form>
    </div>
</dialog>
