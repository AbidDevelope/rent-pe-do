<?php

namespace App\Http\Controllers\Web\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('categories.index', $data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories'), $filename);
        }

        Category::create([
            'name' => $request->name,
            'image' => $filename
        ]);

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $data['categories'] = Category::find($id);
        return view('categories.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $categories = Category::where('id', $id)->first();
        if ($categories) {
            $fileName = $categories->image;
            if ($request->hasFile('image')) {
                $oldPath = public_path('images/categories/' . $categories->image);

                if ($categories->image && file_exists($oldPath)) {
                    unlink($oldPath);
                }

                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/categories'), $fileName);
            }
            $categories->update([
                'name' => $request->name,
                'image' => $fileName
            ]);
        }

        return redirect()->route('categories');
    }

    public function delete(Request $requset, $id)
    {
        $categories = Category::where('id', $id)->first();
        if ($categories) {
            $categories->delete();
            return redirect()->back();
        }
    }
}
