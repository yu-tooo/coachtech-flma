<x-owner.main-layout :role="$role">
  <div class="mx-auto sm:w-4/5 md:w-3/5 lg:w-2/5 pb-4">
    <h1 class="text-xl font-bold mb-4 text-center">プロフィール</h1>
    <div class="relative w-fit mx-auto mb-2 px-12 ">
      <x-email-icon class="absolute right-0 bottom-0 stroke-1 cursor-pointer" />
      <img src="{{ asset('storage/image/'. $user->profile->getUrl()) }}" class="w-36 h-36 rounded-full object-cover">
    </div>
    <x-owner.readonly labelName='登録番号' :value="$user->id" />
    <x-owner.readonly labelName='名前' :value="$user->name" />
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
</x-owner.main-layout>