<x-user_layout>
    <div class="ml-10 lg:ml-80 pt-2">
        <div class="w-full grid justify-items-end">
            <button class="bg-blue-600 p-2 text-white font-bold rounded-lg mr-4 hover:bg-blue-800">
                <a href="/admin/bookings/create">Create New Booking</a>
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">BOOKING ID</th>
                        <th scope="col" class="px-4 py-3">CUSTOMER NAME</th>
                        <th scope="col" class="px-4 py-3">CUSTOMER EMAIL</th>
                        <th scope="col" class="px-4 py-3">ROOM NAME</th>
                        <th scope="col" class="px-4 py-3">ROOM IMAGE</th>
                        <th scope="col" class="px-4 py-3">CAPACITY</th>
                        <th scope="col" class="px-4 py-3">CHECKED IN</th>
                        <th scope="col" class="px-4 py-3">CHECKED OUT</th>
                        <th scope="col" class="px-6 py-3">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        @foreach($booking->rooms as $room) <!-- Move the room iteration here -->
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->customer_name }}</td>
                                <td>{{ $booking->customer_email }}</td>
                                <td>{{ $room->name }}</td>
                                <td>
                                    <img src="{{ asset('thumbnail/' . $room->thumbnail) }}" alt="" width="100"> 
                                </td>
                                <td>{{ $room->capacity }}</td>
                                <td>{{ $booking->check_in }}</td>
                                <td>{{ $booking->check_out }}</td>
                                <td class="px-2 py-4 flex">
                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                                    <form action="{{ route('admin.bookings.destroy', $room->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-full">
                            <td colspan="9" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Bookings Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-user_layout>
