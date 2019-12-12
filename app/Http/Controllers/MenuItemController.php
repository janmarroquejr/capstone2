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

    public function displayByCategory($id) {
        $categories = Category::all();
        $menu_items = MenuItem::select('name', 'price', 'description', 'image_path')->where('category_id', '=', $id)->get();
        // dd($menu_items);
        return view('menu.menu', compact('categories', 'menu_items'));
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
        session()->flash('success', 'Menu Item Added Successfully!');
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
        session()->flash('update', 'Menu Item Updated Successfully!');
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
        session()->flash('delete', 'Menu Item Deleted Successfully!');
        return redirect('/addmenuitems');
    }

    public function preOrder($id, Request $request) {
        
        var_dump($request->quantity);
        if(session()->has("order")){
            $order = collect(session("order"));
        } else {
            $order = collect([]);
        }

        if($order->has($id)){
            $order[$id] += $request->quantity;
        }else {
            $order[$id] = $request->quantity;
        }
        
        session(["order" => $order]);

        var_dump(session('order'));
    }

    public function displayPreOrders(){
        $order = session('order');
        $menu_items = collect();
        $total = 0;
        foreach($order as $itemId => $quantity){
            $menu_item = MenuItem::find($itemId);
            $total += $menu_item->price;
            $menu_item->quantity = $quantity;
            $menu_items->push($menu_item);
        }
        return view("booking.preorders", compact("menu_items", 'total'));
    }

    public function archive() {
        $menu_items = MenuItem::onlyTrashed()->get();
        return view('', compact('menu_items'));
    }
}
