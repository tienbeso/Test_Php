<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemSaleRequest;
use App\Models\ItemSale;

class ItemSaleController extends Controller
{
    public function index()
    {
        $items = ItemSale::orderBy('id', 'desc')->get();
        return view('items.index', compact('items'));
    }
    public function create()
    {
        return view('items.create');
    }
    public function store(ItemSaleRequest $request)
    {
        ItemSale::create($request->validated());

        return redirect()
            ->route('items.index')
            ->with('success', 'Thêm item thành công!');
    }
}
