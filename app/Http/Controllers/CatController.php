<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StarController;
use App\Models\Photo;


class CatController extends Controller
{
   
    public function index(User $user)
    {
        $cats = Cat::all();
        $user_id = auth()->user()->id;

        return view('back.cats.index',[
            'cats'=>$cats,
            'user'=>$user,
            'user_id'=>$user_id,
        ]);
        
    }

    
    public function create()
    {
        return view('back.cats.create');
    }

    

    
    // public function store(Request $request, Cat $cat )
    // {   
    //     $validator = Validator::make($request->all(), [
    //         // 'title' => 'required|min:3|max:100',
    //         'photo' => 'sometimes|required|image|max:512',
    //         'gallery.*' => 'sometimes|required|image|max:512'
    //     ]);

    //     if ($validator->fails()) {
    //         $request->flash();
    //         return redirect()
    //             ->back()
    //             ->withErrors($validator);
    //     }

    //     $photo = $request->photo;
        
    //     if ($photo) {
    //     $name = $photo->getClientOriginalName();
    //     $name = rand(10000, 999999) . '-' . $name;
    //     $path = public_path() . '/gallery/';
    //     $photo->move($path, $name);
    //     }
         
    //     //NAUJOS ISTORIJAS SAUGOJIMAS
    //     $cat = new Cat;
    //     $cat->story_title = $request->story_title;
    //     $cat->story = $request->story;
    //     $cat->sum_colect = $request->sum_colect;
    //     $cat->photo = $name ?? null;
    //     $cat->hearts_count = $request->hearts_count;
        

        
    //     $cat->save();
    //     return redirect()->route('cats-index')
    //     ->with('ok', 'New story created!');
    // }

    
    public function show(Cat $cat, User $user)
    {
        $cats = Cat::all();
        $users = User::all();
        $hearts_count = $cat->hearts_count;


        
        return view('back.cats.show',[
            'cat'=> $cat,
            'cats'=>$cats,
            'user'=>$user,
            'photo' => $name ?? null,
            'hearts_count' => $hearts_count,
            
        ]);
    }

    public function store(Request $request, Cat $cat )
{   
    $validator = Validator::make($request->all(), [
        'story_title' => 'required|min:2|max:100',
        'story' => 'required|min:2',
        'sum_colect' => 'required|integer',
        'photo' => 'sometimes|required|image|max:512',
        'gallery.*' => 'sometimes|required|image|max:512',
        // 'hearts_count' => 'required|integer|min:1|max:5'
    ]);

    if ($validator->fails()) {
        $request->flash();
        return redirect()
            ->back()
            ->withErrors($validator);
    }
    $catId = $request->cat_id;
    $photo = $request->photo;
    
    if ($photo) {
    $name = $photo->getClientOriginalName();
    $name = rand(10000, 999999) . '-' . $name;
    $path = public_path() . '/gallery/';
    $photo->move($path, $name);
    // Photo::create([
    //     'cat_id'=>$catId,
    //     'photo'=>$name,

    // ]);

    }
     
    //NAUJOS ISTORIJAS SAUGOJIMAS
    $cat = new Cat;
    $cat->story_title = $request->story_title;
    $cat->story = $request->story;
    $cat->sum_colect = $request->sum_colect;
    $cat->photo = $name ?? null;
    $cat->hearts_count = $request->hearts_count;
    

    
    $cat->save();
    return redirect()->route('cats-index')
    ->with('ok', 'New travel created!');
}


   
    public function edit(Cat $cat)
    {
        //
    }

    public function update(Request $request, Cat $cat)
    {
        //
    }  

    public function destroy(Cat $cat, Request $request)
    {
        

        if ($cat->photo) {
            $photo = public_path() . '/gallery/'. $cat->photo;
            unlink($photo);
        }

        $cat->delete();
        return redirect()->route('cats-index')->with('info', 'Travel is deleted!');; 
    }

    public function addDonation(Request $request, Cat $cat)
    {
        $cat->sum_present = $cat->sum_present + $request->person_money;
        $cat->person = auth()->user()->name; 
        $cat->person_money = $request->person_money;
        $cat->save();
        return redirect()->back();
    }
}