<x-user-item-detail>
  <x-slot name="first">
    <img class="mx-auto w-96 shadow-md" src="{{ asset('/storage/image/'. $item->img_url) }}" alt="画像が見つかりません">
  </x-slot>

  <x-slot name="second">
    <h1 class="text-2xl font-extrabold">{{ $item->name }}</h1>

    <h3 class="text-lg my-2">￥{{ number_format($item->price) }}(値段)</h3>

    <div class="flex gap-x-4">
      <div>
        @if($item->like->isLike(Auth::guard('users')->id(), $item->id))
        <form method="POST" action="{{ route('user.unlike', ['item_id' => $item->id]) }}">
          @csrf
          <button><x-star-icon class="stroke-yellow-500 fill-yellow-400" /></button>
        </form>
        @else
        <form method="POST" action="{{ route('user.like', ['item_id' => $item->id]) }}">
          @csrf
          <button><x-star-icon class="stroke-yellow-500" /></button>
        </form>
        @endif
        <p class="text-center">
          {{ $item->like->getCount($item->id) }}
        </p>
      </div>
      <div>
        <a href="{{ route('user.comment', ['item_id' => $item->id]) }}">
          <button><x-bubble-icon /></button>
        </a>
        <p class="text-center">
          {{ $item->comment->getCount($item->id) }}
        </p>
      </div>
    </div>

    <a class="w-full mt-4" href="{{ route('user.purchase', ['item_id' => $item->id]) }}">
      <x-user.button name="購入する" />
    </a>

    <h2 class="text-xl font-bold pt-8">商品説明</h2>
    <p>{{ $item->description }}</p>
    <h2 class=" text-xl font-bold pt-8">商品の情報</h2>
    <table class="table-fixed border-separate border-spacing-x-1 border-spacing-y-4 w-full lg:w-4/5">
      <tr>
        <th class="w-2/5">カテゴリー</th>
        @foreach($categories as $category)
        <td class="bg-gray-300 text-center w-1/5 text-sm rounded-2xl px-2">
          {{ $category }}
        </td>
        @endforeach
      </tr>
      <tr>
        <th class="w-2/5">商品の状態</th>
        <td class="w-1/5 text-center">{{ $item->condition->getCondition() }}</td>
      </tr>
    </table>
  </x-slot>
</x-user-item-detail>