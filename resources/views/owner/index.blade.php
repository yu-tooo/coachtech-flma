<x-owner.main-layout :ownerName="$ownerName">
  <h1 class="text-lg font-bold mb-8">ユーザ一覧</h1>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-8 gap-y-8">
    @foreach($users as $user)
    <div class="flex flex-col items-center">
      <img src="{{ asset('storage/image/'. $user->profile->getUrl()) }}" class="w-36 h-36 rounded-full object-cover mb-2">
      {{ $user->name }}
    </div>
    @endforeach
  </div>
</x-owner.main-layout>