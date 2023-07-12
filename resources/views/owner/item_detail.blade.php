<x-owner.main-layout :role="$role">
  <div class="block md:flex md:justify-between py-4 px-0 sm:px-8">
    <div class="w-4/5 sm:w-3/5 md:w-2/5 mx-auto">
      <h1 class="text-xl font-bold mb-2 ml-2">{{ $item->name }}</h1>
      <img src="{{ asset('storage/image/'. $item->img_url) }}" class="shadow-md">
      @if(!$item->delete_flag)
      <form method="POST" action="{{ route($role->role. '.item_delete', ['item_id' => $item->id]) }}">
        @csrf
        <button class="block w-60 mx-auto my-6 p-2 bg-red-500 border border-red-500 rounded-lg text-lg text-white hover:bg-white hover:text-red-500">
          この商品を削除する
        </button>
      </form>
      @else
      <form method="POST" action="{{ route($role->role. '.item_restore', ['item_id' => $item->id]) }}">
        @csrf
        <button class="block w-60 mx-auto my-6 p-2 bg-green-500 border border-green-500 rounded-lg text-lg text-white hover:bg-white hover:text-green-500">
          元に戻す
        </button>
      </form>
      @endif
    </div>
    <div class="w-full md:w-3/5 md:pl-16 mt-12">
      <a href="{{ route($role->role. '.user', ['user_id' => $item->user->id]) }}" class="flex items-center w-64 mx-auto md:mx-8 space-x-8">
        <img src="{{ asset('storage/image/'. $item->user->profile->getUrl()) }}" class="w-20 h-20 rounded-full object-cover">
        <h2 class="text-xl font-bold -translate-y-1/4">{{ $item->user->name }}</h2>
      </a>
      <div class="flex space-x-8 my-4 w-fit mx-auto md:mx-2">
        <div class="flex items-end space-x-2">
          <x-star-icon class="stroke-yellow-500 fill-yellow-400" />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">{{ $item->like_count }}</span>
        </div>
        <div class="flex items-end space-x-2">
          <x-bubble-icon />
          <x-cross-icon class="-translate-y-1/3 translate-x-1/4" />
          <span class="text-xl font-bold">{{ $item->comment_count }}</span>
        </div>
      </div>
      <h2 class="text-lg font-semibold">コメント</h2>
      <div class="w-full lg:w-10/12">
        @foreach($item->comments as $comments)
        <input class="w-full py-1.5 px-2 mb-4 bg-gray-200 rounded-sm outline-none" value="{{ $comments->comment }}" readonly>
        @endforeach
      </div>
    </div>
  </div>
</x-owner.main-layout>