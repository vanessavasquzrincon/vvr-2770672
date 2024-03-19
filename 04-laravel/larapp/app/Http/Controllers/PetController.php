<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::paginate(5);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'photo' => ['required', 'image'],
            'kind' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'bread' => ['required', 'string'],
            'location' => ['required', 'string']
        ]);

        
        if($validated){
            if ($request->hasFile('photo')){
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
    
            $pet = Pet::create([
                'name' => $request->name,
                'photo' => $photo,
                'kind' => $request->kind,
                'weight' => $request->weight,
                'age' => $request->age,
                'bread' => $request->bread,
                'location' => $request->location,
                
            ]);

            if ($pet){
                return redirect('pets')->with('message', 'The pet:'.$request->name.'was succesfully added!');

            }

            



        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'photo' => ['required', 'image'],
            'kind' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'bread' => ['required', 'string'],
            'location' => ['required', 'string']
        ]);

        
        if($validated){
            if ($request->hasFile('photo')){

                //Delete photo
                $image_path = public_path("/images/".$pet->photo);
                if(file_exists($image_path)){

                    unlink($image_path);
            }


                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);

            } else {
                $photo = $request->photoactual;
            }

        
                
    
            $pet->name = $request->name;
            $pet->photo = $photo;
            $pet->kind = $request->kind;
            $pet-> weight = $request->weight;
            $pet-> age = $request->age;
            $pet-> bread = $request->bread;
            $pet-> location = $request->location;
            

            if ($pet->save()){
                return redirect('pets')->with('message', 'The pet:'.$request->name.'was succesfully edited!');

            }

            



        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        // Delete photo
        $image_path = public_path("/images/".$pet->photo);
        if (file_exists($image_path)) {
                unlink($image_path);
        } 
        
        if ($pet->delete()) {
            return redirect('pets')->with('message', 'The pet: '.$pet->name.' was successfully deleted!');
        }
    }
}
