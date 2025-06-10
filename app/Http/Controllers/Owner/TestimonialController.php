<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with(['user', 'product'])->latest()->get();
        return view('owner.testimonials.index', compact('testimonials'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:1000'
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->reply = $request->reply;
        $testimonial->status = 'approved';
        $testimonial->save();

        return redirect()->route('owner.testimonials.index')->with('success', 'Testimoni dibalas');
    }
}
