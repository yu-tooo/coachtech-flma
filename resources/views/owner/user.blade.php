<x-owner.main-layout :role="$role">
  <div x-data="email">
    <div class="mx-auto sm:w-4/5 md:w-3/5 lg:w-2/5 pb-4">
      <h1 class="text-xl font-bold mb-6 text-center">プロフィール</h1>
      <div class="relative w-fit mx-auto mb-2 px-12 ">
        <x-email-icon @click="toggle" class="absolute right-0 bottom-0 stroke-1 cursor-pointer" />
        <img src="{{ asset('storage/image/'. $user->profile->getUrl()) }}" class="w-36 h-36 rounded-full object-cover">
      </div>
      <x-owner.readonly labelName='会員番号' :value="$user->id" />
      <x-owner.readonly labelName='名前' :value="$user->name" />
      <x-owner.readonly labelName='メールアドレス' :value="$user->email" />
      <x-owner.readonly labelName='郵便番号' :value="$user->profile->getPostCode()" />
      <x-owner.readonly labelName='住所' :value="$user->profile->getAddress()" />
      <x-owner.readonly labelName='建物' :value="$user->profile->getBuilding()" />

      @auth('admin')
      <form method="POST" action="{{ route($role->role. '.user_delete', ['user_id' => $user->id]) }}">
        @csrf
        <button class="block bg-red-700 border border-red-700 p-2 mt-4 w-1/2 rounded-md text-white mx-auto hover:bg-white hover:text-red-700">このユーザを削除する</button>
      </form>
      @endauth
    </div>
    <div id="modal" @click="toggle" class="fixed w-full h-screen top-0 left-0 bg-gray-500 bg-opacity-80 hidden">
      <div @click="toggle" class="absolute w-96 max-w-full top-20 right-0 sm:right-10 md:right-20 bg-white border rounded-lg">
        <h2 class="px-4 py-2 text-lg bg-gray-900 text-white rounded-t-lg">
          メッセージ
        </h2>
        <form method="POST" action="{{ route($role->role. '.email', ['to' => $user->email, 'name' => $role->name]) }}">
          @csrf
          <div class="flex items-center px-4 pt-2">
            <label for="title">件名</label>
            <input type="text" id="title" name="title" class="w-10/12 h-8 border-none focus:ring-0">
          </div>
          <span class="block w-11/12 h-1 mx-auto bg-gray-100 mb-1"></span>
          <textarea name="body" cols="30" rows="10" class="w-full resize-none border-none focus:ring-0 px-4"></textarea>
          <button class="w-full py-2 bg-gray-800 text-white rounded-b-lg">送信</button>
        </form>
      </div>
    </div>
  </div>
</x-owner.main-layout>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('email', () => ({
      toggle() {
        document.querySelector('#modal').classList.toggle('hidden');
      }
    }))
  })
</script>