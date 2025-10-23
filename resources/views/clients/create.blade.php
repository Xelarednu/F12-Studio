@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    @if(session()->has("success"))
        <div class="success-popup">{{ session("success") }}</div>
    @endif
    <main class="flex-1 p-6">
        <h2 class="font-bold">Создание новых клиентов & Новой группы</h2>

        <section class="mt-4 flex flex-row">
            <form action="/clients/new" method="POST" class="mr-25">
                @csrf
                <table class="min-w-140 divide-y divide-gray-200 mt-5">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Фамилия</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Группа</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="firstName" placeholder="Имя" required>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="lastname" placeholder="Фамилия" required>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <select name="groups" class="min-w-20">
                                    <option value=""></option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <a href="/clients" class="bg-gray-600 text-white p-1.5 m-3 rounded cursor-pointer">Назад</a>

                <button type="submit" class="bg-green-600 text-white p-1.5 m-3 ml-100 rounded cursor-pointer">Добавить</button>
            </form>

            <form action="/group/new" method="POST">
                @csrf
                <table class="divide-y divide-gray-200 mt-5">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Группа</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="group" placeholder="Название группы" required>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="bg-green-600 text-white p-1.5 m-3 ml-23 rounded cursor-pointer">Создать группу</button>
            </form>
        </section>
    </main>
</div>
@endsection