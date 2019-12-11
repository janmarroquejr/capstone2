<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Booking;
use Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.adminbooking', compact('bookings')); 
    }

    public function changeStatus($id, Request $request){
        $booking = Booking::find($id);
        $booking->status = $request->status;
        $booking->save();
        return redirect('/viewbookings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new Booking;
        $booking->duration = $request->duration;
        $booking->num_of_guests = $request->num_of_guests;
        $booking->start_date = $request->start_date;
        $booking->start_time = $request->start_time;
        $booking->comments = $request->comments;
        $booking->user_id = Auth::user()->id;
        $booking->food_order_id = null;
        $booking->save();    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find(Auth::user()->id = $id);
        return view('booking.booking', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('/viewbookings');
    }
}
