<x-user_layout>
    <div class="ml-10 lg:ml-80 pt-2">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4  gap-4">
            <a href="">
                <div class="border-4 border-slate-500 bg-orange-400 p-2 w-64 h-40 rounded-lg">
                    <div class="flex flex-col font-bold">
                        <p class="flex justify-center text-white font-[32px]">Users</p>
                        <p class="flex justify-center  pt-8 font-[32px] text-white">All Users</p>
                        {{-- <span class="pl-4 flex-row">8</span> --}}
                    </div>
                </div> 
            </a>
            <a href="">
                <div class="border-4 border-slate-500 bg-green-400 p-2 w-64 h-40 rounded-lg">
                    <div class="flex flex-col font-bold">
                        <p class="flex justify-center text-white font-[15px]">Rooms</p>
                        <p class="flex justify-center  pt-8 font-[32px] text-white">All Rooms</p>
                        {{-- <span class="pl-4 flex-row">8</span> --}}
                    </div>
                </div>
            </a> 
            <a href="">
                <div class="border-4 border-slate-500 bg-blue-400 p-2 w-64 h-40 rounded-lg">
                    <div class="flex flex-col font-bold">
                        <p class="flex justify-center text-white font-[15px]">Booking</p>
                        <p class="flex justify-center  pt-8 font-[32px] text-white">All Bookings</p>
                        {{-- <span class="pl-4 flex-row">8</span> --}}
                    </div>
                </div> 
            </a>
            <a href="">
                <div class="border-4 border-slate-500 bg-red-400 p-2 w-64 h-40 rounded-lg">
                    <div class="flex flex-col font-bold">
                        <p class="flex justify-center text-white font-[15px]">Comments</p>
                        <p class="flex justify-center pt-8 font-[32px] text-white">All Comments</p>
                        {{-- <span class="pl-4 flex-row">8</span> --}}
                    </div>
                </div> 
            </a>
        </div>
    </div>
</x-user_layout>
