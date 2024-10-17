
<x-user_layout>
<div class="ml-10 lg:ml-80 pt-2">

    <div class="w-full grid justify-items-end">
        <button class="bg-blue-600 p-2 text-white font-bold rounded-lg mr-4 hover:bg-blue-800"><a href="/admin/rooms/create">Create New Room</a></button>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 m-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">
                    ID
                </th>
                <th scope="col" class="px-4 py-3">
                    NAME
                </th>
                <th scope="col" class="px-4 py-3">
                    IMAGE
                </th>
                <th scope="col" class="px-4 py-3">
                    SIZE
                </th>
                <th scope="col" class="px-4 py-3">
                    DESCRIPTION
                </th>
                <th scope="col" class="px-4 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-4 py-3">
                    CREATED DATE
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $room->id}}
                </th>
                <td class="px-4 py-4">
                    {{ $room->name}}
                </td>
                <td class="px-4 py-4">
                    <img src="{{ asset('thumbnail/' . $room->thumbnail) }}" alt="Room Image" width="100">
                </td>
                <td class="px-4 py-4">
                    {{ $room->size}}
                </td>
                <td class="px-4 py-4">
                    {{ Str::limit($room->description, 50) }} <!-- Correct truncation -->
                </td>
                <td class="px-4 py-4">
                    {{ $room->status}}
                </td>
                <td class="px-4 py-4">
                    {{ $room->created_at}}
                </td>
                <td class="px-2 py-4 flex ">
                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
                    </form>
                </td>
                
                
            </tr>
            @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-full">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    No Rooms
                </th>
                
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
</x-user_layout>
