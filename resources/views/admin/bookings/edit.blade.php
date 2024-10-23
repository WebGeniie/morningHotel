<x-user_layout>
    <div class="ml-10 lg:ml-80 mt-20 pt-2">
        <h1 class="text-2xl font-bold text-center font-serif text-slate-600">Update Booking Data</h1>
        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="post" enctype="multipart/form-data" class="w-full ml-40">
            @csrf
            @method('PUT')
            <div class="grid lg:grid-cols-3 md:grid-cols-1 ">
                <div class="text-sm text-slate-600 justify-center">
                    <label for="" class="pl-1">Customer Name</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('customer_name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-sm text-slate-600 justify-center space-x-3">
                    <label for="" class="pl-3">Customer Email</label>
                    <input type="email" name="customer_email" value="{{ old('customer_email', $booking->customer_email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('customer_email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-sm text-slate-600 justify-center lg:col-span-2 w-full">
                    <label for="">Select Room</label>
                    <select name="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @foreach ($booking->rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id', $room->id) == $room->id ? 'selected' : '' }}>
                                {{ $room->name }} (Current Status: {{ $room->status }})
                            </option>
                        @endforeach
                    </select>

                    <label for="">Update Room Status</label>
                    <select name="room_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="available" {{ old('room_status', $room->status) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('room_status', $room->status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <div class="text-sm text-slate-600 justify-center">
                        <label for="" class="pl-1">Check In</label>
                        <input type="date" name="check_in" value="{{ old('check_in', $booking->check_in) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('check_in')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-sm text-slate-600 justify-center space-x-3">
                        <label for="" class="pl-3">Check Out</label>
                        <input type="date" name="check_out" value="{{ old('check_out', $booking->check_out) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('check_out')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="bg-blue-400 hover:bg-blue-600 text-center text-white border-2 border-white outline-none p-3 ml-2 rounded-lg w-full col-span-2">
                    <button type="submit">Update Booking</button>
                </div>
            </div>
        </form>
    </div>
</x-user_layout>
