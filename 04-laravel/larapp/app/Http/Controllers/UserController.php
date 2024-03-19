<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'document' => ['required', 'numeric', 'unique:'.User::class],
            'fullname' => ['required', 'string', 'max:64'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'photo' => ['required', 'image'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        
        if($validated){
            if ($request->hasFile('photo')){
                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
    
            $user = User::create([
                'document' => $request->document,
                'fullname' => $request->fullname,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'photo' => $photo,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($user){
                return redirect('users')->with('message', 'The user:'.$request->fullname.'was succesfully added!');

            }

            



        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
        //dd($user->toArray());

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'document' => ['required', 'numeric', 'unique:users,document,'.$user->id],
            'fullname' => ['required', 'string', 'max:64'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        
        if($validated){
            if ($request->hasFile('photo')){

                //Delete photo
                $image_path = public_path("/images/".$user->photo);
                if(file_exists($image_path)){

                    unlink($image_path);
            }


                $photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('images'), $photo);

            } else {
                $photo = $request->photoactual;
            }
    
            $user->document = $request->document;
            $user->fullname = $request->fullname;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user-> photo = $photo;
            $user-> phone = $request->phone;
            $user-> email = $request->email;
            

            if ($user->save()){
                return redirect('users')->with('message', 'The user:'.$request->fullname.'was succesfully edited!');

            }

            



        }
    }

    /**
     * Remove the specified resource from storage.
     */
   
    public function destroy(User $user)
    {
        // Delete photo
        $image_path = public_path("/images/".$user->photo);
        if (file_exists($image_path)) {
                unlink($image_path);
        } 
        
        if ($user->delete()) {
            return redirect('users')->with('message', 'The user: '.$user->fullname.' was successfully deleted!');
        }
    }
}
