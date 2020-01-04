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
    public function store(Request $request, $id)
    {
        // $checker = Booking::select('user_id')->where('user_id', $id)->get();
        $user_id = Booking::select('id')->where([['user_id', "=", $id], ['status', "=", 0]])->get();
        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->duration = $request->duration;
        $booking->num_of_guests = $request->num_of_guests;
        $booking->start_date = $request->start_date;
        $booking->start_time = $request->start_time;
        $booking->comments = $request->comments;

        //dd(count($user_id));
        
        if(count($user_id) == 0){
            $booking->save();
            session()->flash('reserved', 'Reservation Successful!'); 
            
            return back();
        }
            
        else{
            session()->flash('denied', 'You already have an active reservation!');
            
            return back();  
        }
        
        // dd($booking);
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
        $food_id = \App\FoodOrder::find(Auth::user()->id = $id);
        
        return view('booking.booking', compact('user', 'food_id'));
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
        
    }

    public function complete($id){
        $booking = Booking::find($id);
        $booking->status = 1;
        $booking->save();
        return redirect('/viewbookings');
    }

    public function removeItem($id){
        $order = collect(session("order"));
        $order->forget($id);

        session(["order" => $order]);

        session()->flash('removed', 'Removed order successfully!');

        return back();
    }
}
