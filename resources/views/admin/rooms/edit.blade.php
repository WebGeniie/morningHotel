<x-user_layout>

    <div class="ml-10 lg:ml-80 pt-2">
        <h1 class="text-2xl font-bold text-center font-serif text-slate-600">Edit Room Data</h1>
        <form action="{{ route('admin.room.update', $room->id) }}" method="post" enctype="multipart/form-data" class="w-full ml-40">
            @csrf
            @method('PUT')
            <div class="grid lg:grid-cols-3 md:grid-cols-1 ">

                <!-- Name of the Room -->
                <div class="text-sm text-slate-600 justify-center">
                    <label for="">Name of the Room</label>
                    <input type="text" name="name" value="{{ old('name', $room->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <!-- Status -->
                <div class="text-sm text-slate-600 justify-center lg:grid-cols-4 gap-y-8 md:grid-cols-1 pl-6">
                    <label for="">Current Status</label>
                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Available" {{ old('status', $room->status) == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('status', $room->status) == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <!-- Image (optional, if not updated) -->
                <div class="text-sm text-slate-600 content-start mr-0">
                    <label for="" class="pl-6">Choose Image</label>
                    <input type="file" name="thumbnail" class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <!-- Optionally display the current image -->
                    @if($room->thumbnail)
                        <img src="{{ asset('thumbnail/' . $room->thumbnail) }}" alt="Current Room Image" width="100">
                    @endif
                </div>

                

                <!-- Size -->
                <div class="text-sm text-slate-600 justify-center mt-2">
                    <label for="">Size</label>
                    <input type="text" name="size" value="{{ old('size', $room->size) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="text-sm text-slate-600 justify-center mt-2">
                    <label for="">Capacity</label>
                    <input type="text" name="capacity" value="{{ old('size', $room->capacity) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <!-- Description -->
                <div class="text-sm text-slate-600 col-span-3 w-4/6 h-40 items-center mt-4">
                    <label for="message" class="font-bold block mb-2 text-xl text-gray-900 dark:text-white">Description</label>
                    <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter room description...">{{ old('description', $room->description) }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="bg-blue-400 hover:bg-blue-600 text-center text-white border-2 border-white outline-none p-3 ml-7 rounded-lg w-full col-span-2">
                    <button type="submit">Update Room</button>
                </div>

            </div>
        </form>
    </div>
</x-user_layout>