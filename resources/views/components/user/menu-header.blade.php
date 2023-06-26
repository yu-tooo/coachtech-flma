@props([
'isAuth' => true
])
<div x-data="{ open: false }">
  <nav class="relative w-full flex items-center justify-between px-4 h-12 bg-black z-50">
    <div class="flex items-center">
      <a href="/">
        <x-user.application-logo />
      </a>
    </div>

    <div class="hidden md:block w-1/3 mr-4">
      <input class="h-8 rounded-sm w-full border-transparent focus:border-transparent focus:ring-0" type="text" placeholder="何をお探しですか？">
    </div>
    <div class="hidden md:block">
      @if($isAuth)
      <form class="inline-block mr-2" method="POST" action="{{ route('user.logout') }}">
        @csrf
        <button class="text-white outline-none hover:underline">ログアウト</button>
      </form>
      <form class="inline-block mr-4" action="{{ route('user.mypage') }}">
        <button class="text-white outline-none hover:underline">マイページ</button>
      </form>
      @else
      <form class="inline-block mr-2" action="{{ route('user.login') }}">
        <button class="text-white outline-none hover:underline">ログイン</button>
      </form>
      <form class="inline-block mr-4" action="{{ route('user.register') }}">
        <button class="text-white outline-none hover:underline">会員登録</button>
      </form>
      @endif
      <form class="inline-block mr-2" action="{{ route('user.sell') }}">
        <button class="outline-none bg-white px-4 py-0.5 font-medium rounded-sm  border border-white hover:text-white hover:bg-black">出品</button>
      </form>
    </div>

    <button @click="open = ! open" class="md:hidden h-6 w-8 cursor-pointer outline-none">
      <span class="block w-full h-0.5 bg-white mb-2 duration-500" :class="{'translate-y-2.5': open, 'rotate-45': open}"></span>
      <span class="block w-full h-0.5 bg-white mb-2 duration-500" :class="{'-translate-x-4': open, 'scale-0': open}"></span>
      <span class="block w-full h-0.5 bg-white mb-0 duration-500" :class="{'-translate-y-2.5': open, '-rotate-45': open}"></span>
    </button>
  </nav>

  <div class="relative">
    <ul :class="{'translate-y-full': open }" class="absolute -bottom-0 w-full duration-500 bg-black pt-4 text-center border-t border-white">
      <li class="py-4">
        <input class="h-8 w-3/5 rounded-sm border-transparent focus:border-transparent focus:ring-0" type="text" placeholder="何をお探しですか？">
      </li>
      @if($isAuth)
      <li class="py-4 border-t border-dashed border-white">
        <form method="POST" action="{{ route('user.logout') }}">
          @csrf
          <button class="text-white outline-none hover:underline">ログアウト</button>
        </form>
      </li>
      <li class="py-4 border-t border-dashed border-white">
        <form action="{{ route('user.mypage') }}">
          <button class="text-white outline-none hover:underline">マイページ</button>
        </form>
      </li>
      @else
      <li class="py-4 border-t border-dashed border-white">
        <form action="{{ route('user.login') }}">
          <button class="text-white outline-none hover:underline">ログアウト</button>
        </form>
      </li>
      <li class="py-4 border-t border-dashed border-white">
        <form action="{{ route('user.register') }}">
          <button class="text-white outline-none hover:underline">会員登録</button>
        </form>
      </li>
      @endif
      <li class="py-4 border-t border-dashed">
        <form action="{{ route('user.sell') }}">
          <button class="w-3/5 py-2 text-white outline-none border border-white font-bold hover:bg-white hover:text-black">出品</button>
        </form>
      </li>
    </ul>
  </div>
</div>