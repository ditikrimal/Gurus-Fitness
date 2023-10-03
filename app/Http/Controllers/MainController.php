<?php

namespace App\Http\Controllers;

use App\Models\carousel;
use App\Models\listing;
use App\Models\Main;
use Illuminate\Http\Request;
use App\Models\AboutData;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function testSite()
    {
        return view('testSite');
    }
    public function showListings()
    {
        return view('navlinks.listings.listings', 
        // [
        //     'listings' => Main::latest()
        //         ->filter(request(['tag', 'search']))
        //         ->paginate(6),
        // ]
    );
    }
    public function show(Main $listing)
    {
        return view('listings.listing', [
            'listing' => $listing,
        ]);
    }
    public function createListing()
    {
        return view('listings.createListing', []);
    }
    public function store(Request $request)
    {
        $inputData = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'companyName' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $inputData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $inputData['user_id'] = auth()->id();

        Main::create($inputData);

        return redirect('/listings')->with('createMessage', 'Listing Added Succesfully!');
    }

    public function edit(Main $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Main $listing)
    {
        $inputData = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'companyName' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $inputData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($inputData);

        return redirect('/listings/manage')->with('createMessage', 'Listing Updated Succesfully!');
    }
    public function delete(Main $listing)
    {
        $listing->delete();
        return redirect('/listings/manage')->with('createMessage', 'Listing deleted Succesfully!');
    }
    public function aboutUs()
    {
        
        return view('navlinks.about-us', [
            'aboutData' => AboutData::latest()->get()
        ]);
    }
}
