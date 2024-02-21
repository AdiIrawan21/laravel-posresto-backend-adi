<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //index
    public function index(Request $request)
    {
        $query = Category::query(); // Mulai dengan membangun kueri Eloquent dari model Product
        // Tambahkan filter pencarian jika ada
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $categories = $query->paginate(10);
        return view('pages.categories.index', compact('categories'));
    }

    //create
    public function create()
    {
        return view('pages.categories.create');
    }

    //store
    public function store(Request $request)
    {
        //validate the request...
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //store the request...
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        //save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
            $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    //show
    public function show($id)
    {
        return view('pages.categories.show');
    }

    //edit
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.categories.edit', compact('category'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate the request...
        $request->validate([
            'name' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //update the request...
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        //save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
            $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
            //$category->save();
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        // Ambil produk yang akan dihapus
        // $category = Category::find($id);
        // // Periksa apakah produk ditemukan
        // if ($category) {
        //     // Hapus file gambar dari sistem file
        //     if ($category->image) {
        //         Storage::delete('public/categories/' . basename($category->image));
        //     }
        //     // Hapus produk dari database
        //     $category->delete();
        //     return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        // } else {
        //     return redirect()->route('categories.index')->with('error', 'Category not found');
        // }


        //delete the request...
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}