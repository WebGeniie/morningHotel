<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class AdminBookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('rooms')->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    public function create() {
        $rooms = Room::where('status','available')->get();
        return view('admin.bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_ids' => 'required|array', // Ensure room_ids is an array
            'room_ids.*' => 'exists:rooms,id', // Ensure each room ID exists
        ]);

        // Create the booking
        $booking = Booking::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        // Attach selected rooms to the booking
        $booking->rooms()->attach($request->room_ids);

        // Update the status of the booked rooms to 'unavailable'
        Room::whereIn('id', $request->room_ids)->update(['status' => 'unavailable']);

        // Redirect back with a success message
        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully, and selected rooms are now unavailable.');
    }

    public function edit(Booking $booking, Room $rooms) {
        $rooms = Room::where('status','unavailable')->get();
        return view('admin.bookings.edit', compact('booking', 'rooms'));
    }
    public function update(Request $request, Booking $booking) {
        // Log the incoming request data
        \Log::info('Update method accessed', $request->all());
        
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'room_id' => 'required|exists:rooms,id', // Validate single room ID
            'room_status' => 'required|string|in:available,unavailable',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);
    
        // Update booking details
        $booking->customer_name = $request->customer_name;
        $booking->customer_email = $request->customer_email;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->save();
    
        // Update the status of the selected room
        $room = Room::find($request->room_id);
        $room->status = $request->room_status; 
        $room->save(); // Save the updated room status
    
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }
    
    public function destroy(Booking $booking) {
        // Log the booking ID being deleted
        \Log::info('Deleting booking with ID: ' . $booking->id);
    
        // Update the status of associated rooms to 'available'
        $booking->rooms()->each(function ($room) {
            $room->status = 'available';
            $room->save();
        });
    
        // Delete the booking
        $booking->delete();
        
        // Log redirect action
        \Log::info('Redirecting after delete to bookings.index');
    
        // Redirect back with a success message
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully, and associated rooms are now available.');
    }
    
    
}
