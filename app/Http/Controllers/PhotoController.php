<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;

use App\Models\Cat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\StarController;


class PhotoController extends Controller
{
    // public function storeGal(Request $request)
    // {
    //     $photo = $request->photo;
    //     $catId = $request->cat_id;

     

    //     if ($photo) {
    //     $name = $photo->getClientOriginalName();
    //     $name = rand(10000, 999999) . '-' . $name;
    //     $path = public_path() . '/gallery/';
    //     $photo->move($path, $name);
    //     }

    //     $photo = new Photo;
    //     $photo->photo = $name ?? null;
    //     $photo->cat_id = $catId;

    //     $photo->save();
    //     return redirect()->route('cats-index')
    //     ->with('ok', 'New photo added');


        
    // }

    public function storeGal(Request $request)
{
    $photo = $request->photo;
    $catId = $request->cat_id;

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

    if (isset($name)) {
        $photo = new Photo;
        $photo->photo = $name;
        $photo->cat_id = $catId;
        $photo->save();
        return redirect()->back()->with('ok', 'New photo added');
    } else {
        return redirect()->back()->with('error', 'Please select a photo to upload');
    }
}

    public function createPhoto()
{
    $photos = Photo::all();
    return view('back.cats.create-gallery')->with('photos', $photos);
}

// public function destroyGal(Photo $photo, Request $request)
//     {
        

//         if ($photo->photo) {
//             $photo = public_path() . '/gallery/'. $photo->photo;
//             unlink($photo);
//         }

//         $photo->delete();
//         return redirect()->back(); 
//     }

// public function destroyGal(Photo $photo, Request $request)
// {
//     if ($photo->photo) {
//         $photoPath = public_path('gallery') . '/' . $photo->photo;
//         if (file_exists($photoPath)) {
//             unlink($photoPath);
//         }
//     }

//     $photo->delete();

//     return redirect()->back();
// }
public function destroyGal(Photo $photo, Request $request)
{
    if ($photo->photo) {
        $photoPath = public_path('gallery') . '/' . $photo->photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $photo->delete();

    // Reorder the IDs
    $photos = Photo::orderBy('id')->get();
    $count = 1;
    foreach ($photos as $photo) {
        $photo->id = $count;
        $photo->save();
        $count++;
    }

    return redirect()->back();
}


    
}