<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $testimonials = Testimonial::orderBy('order')->get();

        $testimonialsVisible = $testimonials->filter(function ($testimonial, $key) {
            return $testimonial->visible;
        })->values();

        $testimonialsNotVisible = $testimonials->filter(function ($testimonial, $key) {
            return ! $testimonial->visible;
        })->values();

        return view('index')->with([
            'testimonials' => $testimonials,
            'testimonialsVisible' => $testimonialsVisible,
            'testimonialsNotVisible' => $testimonialsNotVisible,
        ]);
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
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
       
        Testimonial::truncate();
        foreach ($request->testimonials as $testimonial) {
            Testimonial::create([
                'id' => $testimonial['id'],
                'name' => $testimonial['name'],
                'qoute' => $testimonial['qoute'],
                'visible' => true,
                'order' => $testimonial['order']
            ]);
            
        }
        return response('update successfull',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
