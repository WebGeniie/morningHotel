{{-- Navbar Area --}}
<nav class="bg-slate-300 h-16 rounded-lg  -mt-5">
    <div class="flex flex-cols justify-between space-x-2 p-2">
        <div class="">
            <a href="admin"><img src="images/morninghotel.png" class="w-24" alt=""></a>
        </div>
        <div class="pl-8">
            logo
        </div>
        <div class="relative inline-block text-left pr-8">
            <div>
                <!-- Logo that acts as a dropdown toggle -->
                <button type="button" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none" id="dropdown-button" aria-expanded="false">
                    Logo
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        
            <!-- Dropdown menu -->
            <div class="absolute right-0 z-10 hidden mt-2 w-48 bg-white rounded-md shadow-lg" id="dropdown-menu">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Action 1</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Action 2</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Action 3</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Action 4</a>
                </div>
            </div>
        </div>
        
    </div>
</nav>

<script>
    document.getElementById('dropdown-button').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdown-menu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Optional: Close the dropdown if clicked outside
    window.addEventListener('click', function(event) {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>