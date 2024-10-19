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

}
