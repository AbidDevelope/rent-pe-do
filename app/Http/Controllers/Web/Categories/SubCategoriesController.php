<?php

namespace App\Http\Controllers\Web\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
  public function subcategories()
  {
    $data['subcategories'] = SubCategory::with('category')->get();
    // dd($data['subcategories']);
    return view('subcategories.index', $data);
  }

  public function create()
  {
    $data['categories'] = Category::all();
    return view('subcategories.create', $data);
  }

  public function store(Request $request)
  {
    $validate = Validator::make($request->all(), [
      'category_id' => 'required',
      'name' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,jpg,png,wepb,gif|max:1024',
    ]);

    if ($validate->fails()) {
      return redirect()->back()->withInput()->withErrors($validate);
    }

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $filename = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('images/subcategories'), $filename);
    }

    SubCategory::create([
      'category_id' => $request->category_id,
      'name' => $request->name,
      'image' => $filename,
    ]);

    return redirect()->route('sub.categories');
  }

  public function edit($id)
  {
    $data['subcategories'] = SubCategory::where('id', $id)->first();
    $data['categories'] = Category::all();

    return view('subcategories.edit', $data);
  }

  public function update(Request $request, $id)
  {
    $validate = Validator::make($request->all(), [
      'category_id' => 'required|exists:categories,id',
      'name' => 'required|string|max:255'
    ]);

    if ($validate->fails()) {
      return redirect()->back()->withInput()->withErrors($validate);
    }

    $subcategories = SubCategory::where('id', $id)->first();
    if ($subcategories) {
      $fileName = $subcategories->image;
      if ($request->hasFile('image')) {
        $oldPath = public_path('images/subcategories/' . $subcategories->image);
        if ($subcategories->image && file_exists($oldPath)) {
          unlink($oldPath);
        }

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/subcategories'), $fileName);
      }

      $subcategories->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'image' => $fileName
      ]);
    }

    return redirect()->route('sub.categories');
  }

  public function delete(Request $request, $id)
  {
    $subcategories = SubCategory::where('id', $id)->first();
    if ($subcategories) {
      $subcategories->delete();

      return redirect()->back();
    }
  }
}
