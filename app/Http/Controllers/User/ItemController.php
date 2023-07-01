<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $user_id = Auth::guard('users')->id();

        $items = Item::where('user_id', '!=', $user_id)->doesntHave('sold_items')
        ->get();

        $likedItems = Item::whereHas('likes', function($query) use($user_id) {
            $query->where('user_id', $user_id);
        })->doesntHave('sold_items')->get();

        return view('user.index', ['items' => $items, 'l_items' => $likedItems]);
    }
    
    public function detail($item_id)
    {
        $items = Item::find($item_id);
        $class = Item::find($item_id)->categories()->pluck('name');
        return view('user.item', ['item' => $items, 'categories' => $class]);
    }

    public function sellView()
    {
        return view('user.sell');
    }

    public function sellCreate(Request $request)
    {
        $new_img = $request->file('image')->store('public/image/items');
        $img_url = mb_substr($new_img, mb_strpos($new_img, 'items/'));

        $categories_id = [];
        foreach ($request->categories as $category) {
            if (Category::where('name', $category)->exists()) {
                $categories_id[] = Category::where('name', $category)->value('id');
            } else {
                Category::create(['name' => $category]);
                $categories_id[] = Category::latest('id')->value('id');
            }
        }
        
        Condition::create(['condition' => $request->condition]);
        $condition_id = Condition::latest('id')->value('id');
        $item =Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img_url' => $img_url,
            'user_id' => Auth::guard('users')->id(),
            'category_item_id' => 0,
            'condition_id' => $condition_id
        ]);
        
        $item->categories()->sync($categories_id);
        return redirect(route('user.mypage'));
    }
}
