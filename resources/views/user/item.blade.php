<x-user-item-detail>
  <x-slot name="first">
    <img class="mx-auto w-96 shadow-md" src="{{ asset('/storage/image/'. $item->img_url) }}" alt="画像が見つかりません">
  </x-slot>

  <x-slot name="second">
    <h1 class="text-2xl font-extrabold">{{ $item->name }}</h1>

    <h3 class="text-lg my-2">￥{{ number_format($item->price) }}(値段)</h3>

    <div class="flex gap-x-4">
      <div>
        @if($item->like->isLike(Auth::guard('users')->id()))
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
          {{ $item->like_count }}
        </p>
      </div>
      <div>
        <a href="{{ route('user.comment', ['item_id' => $item->id]) }}">
          <button><x-bubble-icon /></button>
        </a>
        <p class="text-center">
          {{ $item->comment_count }}
        </p>
      </div>
    </div>

    <a class="w-full mt-4" href="{{ route('user.purchase', ['item_id' => $item->id]) }}">
      <x-user.button name="購入する" />
    </a>

    <h2 class="text-xl font-bold pt-8">商品説明</h2>
    <p class="mt-4 whitespace-pre-wrap leading-4">{{ $item->description }}</p>
    <h2 class=" text-xl font-bold pt-8">商品の情報</h2>

    <ul class="flex w-full space-x-8 mt-8">
      <li class="text-lg font-bold whitespace-nowrap mb-2">カテゴリー</li>
      <li>
        @foreach($categories as $category)
        <span class="inline-block bg-gray-300 rounded-2xl ml-1 px-8 mb-2">
          {{ $category }}
        </span>
        @endforeach
      </li>
    </ul>

    <ul class="flex space-x-8 mt-8 w-full">
      <li class="text-lg font-bold whitespace-nowrap">商品の状態</li>
      <li>
        <span class="inline-block px-2">
          {{ $item->condition->getCondition()}}
        </span>
      </li>
    </ul>
  </x-slot>
</x-user-item-detail>