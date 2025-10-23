@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    @if(session()->has("success"))
    <div class="success-popup">{{ session("success") }}</div>
    @endif

    @error('error')
    <div class="error-popup">{{ $message }}</div>
    @enderror
    <main class="flex-1 p-6">
        <h2 class="font-bold">Профиль</h2>
        <section class="mt-4">
            <form action="/profile" method="POST">
                @csrf
                <table class="min-w-full divide-y divide-gray-200 mt-5 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Имя пользователя</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Пароль</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input class="mt-1 text-center" name="username" value="{{ $user->username }}">
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <input class="mt-1 text-center" name="password" value="{{ $user->password }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white p-1.5 m-2 rounded cursor-pointer">Сохранить изменения</button>
            </form>
        </section>
    </main>
</div>
@endsection