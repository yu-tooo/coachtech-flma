<x-user-catalog>
  <div class="lg:px-32">
    <div class="flex flex-col justify-between items-center sm:flex-row">
      <div class="flex flex-col items-center sm:ml-32 md:flex-row">
        <img class="w-24 h-24 rounded-full" src="{{ asset('storage/img/person.png') }}">
        <p class="text-xl font-extrabold md:translate-x-4 md:-translate-y-2">ユーザー名</p>
      </div>

      <div class="mt-4 w-48 sm:mt-0 sm:mr-24">
        <x-user.edit-button name="プロフィールを編集" />
      </div>
    </div>
  </div>
</x-user-catalog>