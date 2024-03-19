<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adops = Adoption::paginate(5);
        return view('adoptions.index')->with('adops', $adops);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adps = Adoption::all();
        $idp = array();
        foreach($adps as $adp){
            $idp[] = $adp->pet_id;

        }
        //$pets = Pet::all()
        $pets = Pet::whereNotIn('id', $idp)->get();
        //dd($pets->toArray());
        return view('adoptions.create')->with('pets', $pets);
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
    public function show(Adoption $adoption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
         // Delete photo
    }

    public function myadoptions(){
        $adps = Adoption::where('user_id', Auth::user()->id)->get();
        //dd($adps)->toArray();
        return view('adoptions.myadoptions')->with('adps', $adps);
    }

    public function add(Request $request){
        $pet = Pet::find($request->id);
        return view('adoptions.add')->with('pet', $pet);
    }
}
