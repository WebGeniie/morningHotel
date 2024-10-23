<x-user_layout>
    <div class="ml-10 lg:ml-80 pt-2">
    
        <div class="w-full grid justify-items-end">
            <button class="bg-blue-600 p-2 text-white font-bold rounded-lg mr-4 hover:bg-blue-800">
                <a href="{{ route('admin.staffs_list.create') }}">Create New Staffs</a>
            </button>
        </div>
    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">FIRST NAME</th>
                        <th scope="col" class="px-4 py-3">LAST NAME</th>
                        <th scope="col" class="px-4 py-3">PHONE NUMBER</th>
                        <th scope="col" class="px-4 py-3">EMAIL</th>
                        <th scope="col" class="px-4 py-3">ROLE</th>
                        <th scope="col" class="px-4 py-3">CREATED DATE</th>
                        <th scope="col" class="px-6 py-3">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staffs as $staff)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $staff->id }}
                            </th>
                            <td class="px-4 py-4">{{ $staff->first_name }}</td>
                            <td class="px-4 py-4">{{ $staff->last_name }}</td>
                            <td class="px-4 py-4">{{ $staff->phone_number }}</td>
                            <td class="px-4 py-4">{{ $staff->email }}</td>
                            <td class="px-4 py-4">
                                {{ $staff->role ? $staff->role->name : 'No Role Assigned' }} <!-- Handle null case -->
                            </td>
                            <td class="px-4 py-4">{{ $staff->created_at->format('Y-m-d') }}</td>
                            <td class="px-2 py-4 flex">
                                <a href="{{ route('admin.staffs_list.edit', $staff->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                                <form action="{{ route('admin.staffs_list.destroy', $staff->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-blue-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-full">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Staffs
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    
    </div>
</x-user_layout>
