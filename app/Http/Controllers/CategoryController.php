<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Rules\CategoryType;
use Validator;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = auth()->user()->categories;

        return view('category.index', compact('categories'));
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::where('user_id', auth()->user()->id)
            ->select('name', 'type', 'created_at')->get();

        //auth()->user()->categories->select('id, name');
        //dd($categories);

        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => ['string', new CategoryType]
        ]);

        if ($validateData->fails())
        {
            return back()->with('errors', $validateData->errors());
        }

        $user = auth()->user();

        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;

        $category->user()->associate($user);

        $category->save();

        return redirect('/categories')->with('success', 'A categoria ' . $category->name . ' foi criada.');
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
