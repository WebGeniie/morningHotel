<x-user_layout>
    <div class="ml-10 lg:ml-80 mt-20 pt-2">
        <h1 class="text-2xl font-bold text-center font-serif text-slate-600">Edit User</h1>
        
        <form action="{{ $edit ? route('admin.staffs_list.update', $staff->id) : route('admin.staffs_list.store') }}" method="post" enctype="multipart/form-data" class="w-full ml-40">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <!-- Grid Container -->
            <div class="grid lg:grid-cols-2 gap-6">

                <!-- First Name & Last Name -->
                <div class="grid lg:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name" 
                            value="{{ old('first_name', $staff->first_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name" 
                            value="{{ old('last_name', $staff->last_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Password (Optional for Update) -->
                <div class="col-span-2 w-48">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (Leave blank if not changing)</label>
                    <input type="password" name="password" id="password" 
                        value="{{ old('password') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Role Dropdown -->
                <div class="col-span-2 w-36">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role_id" id="role" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $staff->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email & Phone Number -->
                <div class="grid lg:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" 
                            value="{{ old('email', $staff->email) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" 
                            value="{{ old('phone_number', $staff->phone_number) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('phone_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update
                </button>
            </div>

        </form>
    </div>
</x-user_layout>
