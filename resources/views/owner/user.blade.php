<x-owner.main-layout :role="$role">
  <div class="mx-auto sm:w-4/5 md:w-3/5 lg:w-2/5">
    <h1 class="text-xl font-bold mb-4 text-center">プロフィール</h1>
    <div class="flex flex-col items-center">
      <img src="{{ asset('storage/image/'. $user->profile->getUrl()) }}" class="w-36 h-36 rounded-full object-cover mb-2">
      {{ $user->name }}
    </div>
    <x-owner.readonly labelName='ID' :value="$user->id" />
    <x-owner.readonly labelName='郵便番号' :value="$user->profile->getPostCode()" />
    <x-owner.readonly labelName='住所' :value="$user->profile->getAddress()" />
    <x-owner.readonly labelName='建物' :value="$user->profile->getBuilding()" />

    @auth('admin')
    <button class="block bg-red-500 border border-red-500 p-2 mt-8 w-1/2 rounded-md text-white mx-auto hover:bg-white hover:text-red-500">このユーザを削除する</button>
    @endauth
  </div>
  </ul>
</x-owner.main-layout>