<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteer_data = Volunteer::where('user_id', Auth::id())->first();
        return view('Users.Volunteer.volunteerIndex')->with(['volunteerData' => $volunteer_data]);
    }

    public function viewAllMenu()
    {
        $menuData = Menu::all();
        return view('Users.Volunteer.memberMenu')->with(['menuData' => $menuData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function deliveryStatus()
    {
        $activeDeliveries = DB::table('orders')
            ->whereNotIn('order_received_status', ['Received Well'])
            ->whereNotIn('order_cooking_status', ['Cancelled'])
            ->get();

        $completedDeliveries = DB::table('orders')
            ->where('order_received_status', 'Received Well')
            ->orWhere('order_cooking_status', 'Cancelled')
            ->get();

        return view('Users.Volunteer.volunteerOrderDelivery', [
            'activeDeliveries' => $activeDeliveries,
            'completedDeliveries' => $completedDeliveries
        ]);
    }

    //GET UPDATE PROFILE
    public function updateProfile($user_id)
    {
        $volunteerData = Volunteer::where('user_id', $user_id)->First();
        $userData = User::where('id', $user_id)->First();

        return view('Users.Volunteer.updateVolunteer2')->with(['volunteerData' => $volunteerData, 'userData' => $userData,]);
    }

    public function updateUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->back()->with('success', 'User information updated successfully');
    }

    public function updateVolunteerProfile(Request $request, $id)
    {
        $volunteer = Volunteer::where('user_id', $id)->firstOrFail();

        $volunteer->update([
            'volunteer_duration' => $request->input('volunteer_duration'),
            'volunteer_available' => $request->input('volunteer_available'),
            'volunteer_vaccination' => $request->input('volunteer_vaccination'),
        ]);

        return redirect()->back()->with('success', 'Volunteer information updated successfully');
    }
}
