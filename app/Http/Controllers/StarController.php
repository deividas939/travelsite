<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Star;
use App\Http\Controllers\StarController;

class StarController extends Controller
{
    public function store($id)
    {
        // Logic to add a star to the story with the given ID
        // You can customize this according to your application's requirements

        // Example logic:
        $cat = new Star();
        $cat->hearts_count = $id;
        $cat->save();

        return redirect()->back()->with('success', 'Star added successfully');
    }
}
