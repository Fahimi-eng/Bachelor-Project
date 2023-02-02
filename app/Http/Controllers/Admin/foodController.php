<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class foodController extends Controller
{
    public function index()
    {
        return view('Admin.Food.index',[
            'foods' => Food::all()
        ]);
    }

    public function create()
    {
        return view('Admin.Food.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('public/Food');
        Food::create([
            'name' => \request('name'),
            'price' => \request('price'),
            'image' => $image,
            'description' => \request('description')
        ]);
        return back();
    }

    public function edit(Food $food)
    {
        return view('Admin.Food.edit',[
            'food' => $food
        ]);
    }

    public function update(Request $request, Food $food)
    {
        if (empty(\request('image')))
        {
            $image = $food->image;
        }
        else
        {
            Storage::delete($food->image);
            $image = $request->file('image')->store('public/Food');
        }

        $food->update([
           'name' => \request('name'),
           'price' => \request('price'),
            'image' => $image,
            'description' => \request('description')
        ]);
        return redirect()->route('panel.food');
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return back();
    }
}
