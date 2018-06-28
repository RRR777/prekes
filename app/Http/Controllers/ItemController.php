<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateItemRequest;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('name', 'asc')->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemRequest $request)
    {
        $item = new Item;
        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category');
        $item->description = $request->input('description');
        $item->save();

        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $category = Category::where('id', $item->category_id)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('items.edit', compact('item', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateItemRequest $request, Item $item)
    {
        $items = Item::orderBy('name', 'asc')->get();

        $item->name = $request->input('name');
        $item->quantity = $request->input('quantity');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category');
        $item->description = $request->input('description');
        $item->save();

        return redirect('/items');
    }

    public function delete(Item $item)
    {
        return view('items.destroy', compact('item'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/items');
    }
}
