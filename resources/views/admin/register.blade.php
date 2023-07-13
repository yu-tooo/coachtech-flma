<x-owner.main-layout :role="$role">
  <div class="w-full sm:w-11/12 md:w-4/5 lg:w-3/5 mx-auto">
    <h1 class="text-xl font-bold text-center mb-4">オーナー</h1>
    <table class="border-collapse border-y border-black w-full mx-auto my-4">
      <tr class="text-lg border-b border-black">
        <th class="border-r border-black py-1.5">名前</th>
        <th class="py-1.5">メールアドレス</th>
      </tr>
      @foreach($owners as $owner)
      <tr>
        <th class="px-8 py-2 border-r border-black">{{ $owner->name }}</th>
        <th class="px-8 py-2">{{ $owner->email }}</th>
        <form method="POST" action="{{ route('owner.delete', ['owner_id' => $owner->id]) }}">@csrf
          <th class="px-2 py-2 hidden sm:block"><button>削除</button></th>
        </form>
      </tr>
      @endforeach
    </table>
    <h2 class="text-lg font-bold text-center mt-8">新規作成</h2>
    <form method="POST" action="{{ route('owner.register') }}" class="w-4/5 md:w-3/5 mx-auto"> @csrf
      <x-admin.form-group name="name" labelName="名前" />
      <x-input-error :messages="$errors->get('name')" class="-translate-y-4" />

      <x-admin.form-group name="email" labelName="メールアドレス" type="email" />
      <x-input-error :messages="$errors->get('email')" class="-translate-y-4" />

      <x-admin.form-group name="password" labelName="パスワード" />
      <x-input-error :messages="$errors->get('password')" class="-translate-y-4" />

      <x-admin.button name="新規作成する" />
    </form>
  </div>
</x-owner.main-layout>