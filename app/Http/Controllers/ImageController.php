<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ImageController extends Controller
{
    public function index():View
    {
        return view('image');
    }
    

    public function imageUpload(Request $request): RedirectResponse
{
    $request->validate(['image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048']);
    $imageName = time() . '.' . $request->image->extension();

    $request->image->move(public_path('images'), $imageName);

    return redirect()->back()->with('success', 'You have successfully uploaded the image.')->with('image', $imageName);
}
}