<x-user-item-detail>
  <x-slot name="first">
    <a href="{{ route('user.item', ['item_id' => $item->id]) }}">
      <img class="mx-auto w-96 shadow-md" src="{{ asset('/storage/image/'. $item->img_url) }}" alt="画像が見つかりません">
    </a>
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

    @foreach($comments as $comment)
    <div class="mt-4 w-full">
      <div class="flex items-end">
        <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('storage/image/'. $comment->user->profile->getUrl()) }}">
        {{ $comment->user->getName()}}
        @if(Auth::id() == $comment->user->id)
        <form method="POST" action="{{ route('user.comment_delete', ['item_id' => $item->id, 'comment_id' => $comment->id]) }}">
          @csrf
          <button class="ml-2"><x-trash_can-icon class="translate-y-1.5" /></button>
        </form>
        @endif
      </div>
      <input class="w-full my-2 p-2 bg-gray-200 rounded-sm outline-none" value="{{ $comment->comment }}" readonly>
    </div>
    @endforeach

    <form method="POST" action="{{ route('user.comment', ['item_id' => $item->id]) }}" class="w-full mt-8">
      @csrf
      <x-user.form-textarea name="comment" labelName="商品へのコメント" value="{{ old('comment') }}" />
      <x-input-error :messages="$errors->get('comment')" class="-translate-y-8" />
      <div class="w-full -mt-4">
        <x-user.button name="コメントを送信する" />
      </div>
    </form>

  </x-slot>
</x-user-item-detail>