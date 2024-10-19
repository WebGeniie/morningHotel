<x-user_layout>

    <div class="ml-10 lg:ml-80 pt-2">
        <h1 class="text-2xl font-bold text-center font-serif text-slate-600">Add Room Data</h1>
        <form action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data" class="w-full ml-40">
            @csrf
            <div class="grid lg:grid-cols-3 md:grid-cols-1 ">
                <div class="text-sm text-slate-600 justify-center">
                    <label for="">Name of the Room</label>
                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="text-sm text-slate-600 justify-center lg:grid-cols-4 gap-y-8 md:grid-cols-1 pl-6">
                    <label for="">Current Status</label>
                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="text-sm text-slate-600 content-start space-x-4">
                    <label for="" class="pl-6">Choose Image</label>
                    <input type="file" name="thumbnail" class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                
                <div class="text-sm text-slate-600 justify-center mt-10">
                    <label for="" >Size</label>
                    <input type="text" name="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="text-sm text-slate-600 justify-center mt-10">
                    <label for="" >Capacity</label>
                    <input type="text" name="capacity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="text-sm text-slate-600 col-span-3 w-4/6 h-40 items-center">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                     <textarea id="message" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea> 
                </div>
                <div class="bg-blue-400 hover:bg-blue-600 text-center text-white border-2 border-white outline-none p-3 ml-7 rounded-lg w-full col-span-2">
                    <button type="submit">Submit</button>
                </div>
            </div>

            
            
        </form>
    </div>
</x-user_layout>
