<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::get();
        return view('front_end.payment', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::where('id', $id)->first(); //->get(); gamim bhani chai iterate garera matra value halnu parcha so
        // echo "<pre>";
        // print_r($student);
        // exit;
        $total_fee = $student->fee;
        $paid_fee = $student->remaining_fee;
        $remaining_fee = $total_fee - $paid_fee;
        return view('front_end.pay', compact('student', 'remaining_fee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studentDetails = Students::where('id', $id)->first();
        $todayPaid = $request->pay;
        $remainingFee = $studentDetails->remaining_fee;
        $totalPaid = $remainingFee + $todayPaid;

        $request->validate([
            'pay' =>'required|numeric',
        ]);

        Students::where('id', $id)->update(['remaining_fee' => $totalPaid]);
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
