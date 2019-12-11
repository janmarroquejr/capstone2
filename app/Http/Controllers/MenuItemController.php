<?php

namespace App\Http\Controllers;

use App\MenuItem;
use \App\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MenuItem::all();
        $categories = Category::all();
        return view('menu.addMenuItems', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $categories = Category::all();
        return view('menu.addMenuItems', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->move('images/', $image->getClientOriginalName());
        $item = new MenuItem;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image_path = "images/".$image->getClientOriginalName();
        $item->category_id = $request->category;
        $item->save();
        return redirect('/addmenuitems');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        $menu_items = MenuItem::all();
        $categories = Category::all();
        return view('menu.menu', compact('menu_items', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem, Request $request)
    {
        $items = MenuItem::all();
        $categories = Category::all();
        return view('menu.editMenuItems', compact('items', 'menuItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $image = $request->file('image');
        if($image){
            $image->move('images/', $image->getClientOriginalName());
            $menuItem->image_path = "images/".$image->getClientOriginalName();
        }

        $menuItem->name = $request->name;
        $menuItem->price = $request->price;
        $menuItem->description = $request->description;
        $menuItem->category_id = $request->category;
        $menuItem->save();
        return redirect('/addmenuitems');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect('/addmenuitems');
    }
}
