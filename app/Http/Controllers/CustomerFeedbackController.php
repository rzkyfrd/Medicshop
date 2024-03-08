<?php

namespace App\Http\Controllers;

use App\Models\CustomerFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feedbacks = CustomerFeedback::all();
        return view('feedback.form', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|numeric',
            'review' => 'required|max:255',
        ]);
        CustomerFeedback::create([...$request->all(), 'user_id' => Auth::user()->id]);
        return redirect()->back()->with('message', 'Feedback Sent Successfully - Thank You');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerFeedback $customerFeedback)
    {
        //
    }
}
