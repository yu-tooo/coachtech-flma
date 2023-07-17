<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\User\ItemsRequest;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::guard('users')->id();

        $items = Item::where('user_id', '!=', $user_id)
        ->where('name', 'LIKE', '%'. $request->name. '%')
        ->doesntHave('sold_items')
        ->where('delete_flag', 0)
        ->get();

        $likedItems = Item::whereHas('likes', function($query) use($user_id) {
            $query->where('user_id', $user_id);
        })->doesntHave('sold_items')
        ->where('delete_flag', 0)
        ->get();

        return view('user.index', ['items' => $items, 'l_items' => $likedItems]);
    }
    
    public function detail($item_id)
    {
        $item = Item::withCount('like')->withCount('comment')->find($item_id);
        $class = Item::find($item_id)->categories()->pluck('name');
        return view('user.item', ['item' => $item, 'categories' => $class]);
    }

    public function sellView()
    {
        if (!Profile::where('user_id', Auth::guard('users')->id())->exists()) {
            return redirect(route('user.profile'));
        }
        $conditions = Condition::get();
        return view('user.sell', ['conditions' => $conditions]);
    }

    public function sellCreate(ItemsRequest $request)
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
        
        $item =Item::create([
            'name' => $request->productName,
            'price' => $request->price,
            'description' => $request->description,
            'img_url' => $img_url,
            'url' => $request->url,
            'user_id' => Auth::guard('users')->id(),
            'condition_id' => $request->condition
        ]);
        
        $item->categories()->sync($categories_id);
        return redirect(route('user.mypage'));
    }
}
