<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Deliver;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_data = Member::where('user_id', Auth::id())->first();
        //dd($member_data);
        return view('Users.Member.memberIndex')->with(['memberData' => $member_data]);
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

    public function saveMemberMealPlan(Request $request, $id)
    {

        //find selected member
        $memberSelected = Member::where('id', $id)->first();

        //save selected member meal type based on distance
        $memberSelected->member_meal_type = $request->input('member_meal_type');
        $memberSelected->member_meal_distance = $request->input('member_meal_distance');
        $memberSelected->save();

        return redirect()->route('member#index');
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
    public function foodSafety()
    {
        return view('Users.Member.foodSafetyDeclaration');
    }
    public function viewAllMenu()
    {
        $menuData = Menu::all();

        return view('Users.Member.memberMenu')->with(['menuData' => $menuData]);
    }

    public function viewMenu($id)
    {
        $partner_data =  Partner::get();
        $user_data = User::get();
        $member_data = Member::where('user_id', Auth::id())->first();
        $viewMenu = Menu::where('id', $id)->first();
        return view('Users.Member.memberMenuDetails')->with([
            'viewMenu' => $viewMenu,
            'userData' => $user_data,
            'partnerData' => $partner_data,
            'memberData' => $member_data,
        ]);
    }

    public function orderConfirmation($partner_id, $menu_id, $user_id)
    {
        $partner_data = Partner::where('id', $partner_id)->first();
        $menu_data = Menu::where('id', $menu_id)->first();
        $user_data = User::where('id', $user_id)->first();
        $member_data = Member::where('user_id', $user_id)->first();
        return view('Users.Member.memberOrderConfirmation')->with([
            'memberData' => $member_data,
            'partnerData' => $partner_data,
            'menuData' => $menu_data,
            'userData' => $user_data,
        ]);
    }

    public function cancelOrder($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        if ($order && $order->order_received_status != 'Received Well' && $order->order_cooking_status != 'Ready to deliver') {
            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'order_cooking_status' => 'Cancelled',
                    'updated_at' => now()
                ]);

            return redirect()->back()->with('success', 'Order cancelled successfully');
        }

        return redirect()->back()->with('error', 'Unable to cancel the order');
    }

    public function deliveryHistory()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Users.Member.deliveryHistory', compact('orders'));
    }

    public function updateMemberOrder($id)
    {

        //find selected order
        $order_selected = Order::where('id', $id)->first();

        //save selected order
        if ($order_selected->order_received_status == null) {
            $order_selected->order_received_status = "Received Well";
        }

        $order_selected->save();

        return redirect()->route('order#showOrderDelivery', Auth::id());
    }

    //GET UPDATE PROFILE
    public function updateProfile($user_id)
    {
        $memberData = Member::where('user_id', $user_id)->First();
        $userData = User::where('id', $user_id)->First();

        return view('Users.Member.updateMember2')->with(['memberData' => $memberData, 'userData' => $userData,]);
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

    public function updateCaregiverProfile(Request $request, $id)
    {
        $member = Member::where('user_id', $id)->firstOrFail();

        $member->update([
            'member_caregiver_name' => $request->input('member_caregiver_name'),
            'member_caregiver_relation' => $request->input('member_caregiver_relation'),
            'member_medical_condition' => $request->input('member_medical_condition'),
            'member_medical_number' => $request->input('member_medical_number'),
            'member_meal_type' => $request->input('member_meal_type'),
        ]);

        return redirect()->back()->with('success', 'Caregiver information updated successfully');
    }

    //REASSESSMENT
    public function reassesment($user_id)
    {
        $memberData = Member::where('user_id', $user_id)->first();

        return view('Users.Member.reassesment')->with([
            'memberData' => $memberData,
        ]);
    }

    public function newReassesment(Request $request, $user_id)
    {
        $updateReassesment = $this->requestReassesment($request);
        Member::where('user_id', $user_id)->update($updateReassesment);

        return redirect()->route('member#index');
    }

    protected function requestReassesment($request)
    {
        $arr = [
            'member_extends_reason' => $request->member_extends_reason,
            'updated_at' => Carbon::now(),
        ];

        return $arr;
    }
}
