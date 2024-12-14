<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\File;

class AdminRoomController extends Controller
{
        // Page to show registered rooms
        public function index(Request $request) {
            $rooms = Room::all();
            return view('admin.rooms.index', compact('rooms'));
        }
        // Page for filling in the Rooms
        public function create() {
            return view('admin.rooms.create');
        }
    
        public function store(Request $request) {
            $validated = $request->validate([
                'name' => 'required|string',
                'thumbnail' => 'required',
                'size' => 'required',
                'capacity' => 'required',
                'status' => 'required',
                'description' => 'required',
            ]);
            $file = $request->file('thumbnail');
            $imageName = time()."_". $file->getClientOriginalName();
            $file->move('thumbnail' , $imageName);

            
    
            Room::create([
                'name' => $request->name,
                'thumbnail' => $imageName,
                'size' => $request->size, 
                'capacity' => $request->capacity, 
                'status' => $request->status,
                'description' => $request->description
            ]);
    
            return redirect()->route('admin.rooms.index')->with('message', 'Successfully created Room.');

        } 
        public function edit(Room $room) {
            return view('admin.rooms.edit', compact('room'));
        }

        public function update(Request $request, Room $room) {
            // Validate the incoming request
            $validated = $request->validate([
                'name' => 'required|string',
                'thumbnail' => 'nullable|image',  // Make this nullable
                'size' => 'required|string',
                'capacity' => 'required|string',
                'status' => 'required|string',
                'description' => 'required|string',
            ]);
        
            // Update the room name, size, status, capacity, and description
            $room->name = $validated['name'];
            $room->size = $validated['size'];
            $room->status = $validated['status'];
            $room->capacity = $validated['capacity'];
            $room->description = $validated['description'];
        
            // Handle thumbnail upload if a new file is provided
            if ($request->hasFile('thumbnail')) {
                // Delete the old image if it exists
                if ($room->thumbnail) {
                    File::delete(public_path('thumbnail/' . $room->thumbnail)); // Ensure the correct path
                }
        
                // Store the new image
                $file = $request->file('thumbnail');
                $imageName = time() . "_" . $file->getClientOriginalName();
                $file->move('thumbnail', $imageName);
        
                // Update the thumbnail path in the database
                $room->thumbnail = $imageName;
            }
        
            // Save the changes to the database
            $room->save();
        
            return redirect()->route('admin.rooms.index')->with('message', 'Room updated successfully.');

        }        

        public function destroy(Room $room) {
        // Gate::authorize('delete', $room);
        File::delete(storage_path('app/public/' . $room->thumbnail));
        $room->delete();
        return to_route('admin.rooms.index');
        }

        
}
