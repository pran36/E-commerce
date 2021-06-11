<?php

namespace App\Http\Controllers;

use App\Models\user_reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $review = new user_reviews();
        $review->user_id = Auth::id();
        $review->rating = $request->rating;
        $review->comment = $request->review;
        $review->product_id = $request->products_id;
        $review->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_reviews  $user_reviews
     * @return \Illuminate\Http\Response
     */
    public function show(user_reviews $user_reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_reviews  $user_reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(user_reviews $user_reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_reviews  $user_reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_reviews $user_reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_reviews  $user_reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_reviews $user_reviews)
    {
        //
    }
}
