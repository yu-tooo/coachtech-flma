<x-user-detail>
  <h1 class="mb-8 text-2xl font-extrabold">プロフィール設定</h1>

  <form class="w-full" method="POST" action="{{ route('user.profile') }}">
    @csrf
    <div class="flex gap-x-12 items-center mb-8">
      <img class="w-32 h-32 rounded-full" src="{{ asset('storage/image/'. $user->profile->getUrl()) }}">
      <x-user.form-file message="画像を選択する" name="image"/> 
    </div>

    <x-user.form-group name="name" labelName="ユーザー名" value="{{ $user->name }}" />
    <x-user.form-group name="postcode" labelName="郵便番号" pattern="\d{3}-\d{4}" value="{{ $user->profile->getPostCode() }}" />
    <x-user.form-group name="address" labelName="住所" value="{{ $user->profile->getAddress() }}" />
    <x-user.form-group name="building" labelName="建物" value="{{ $user->profile->getBuilding() }}" />

    <div class="w-full mt-8">
      <x-user.button name="更新する" />
    </div>
  </form>
</x-user-detail>