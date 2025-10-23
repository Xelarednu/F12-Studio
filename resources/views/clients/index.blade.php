@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    <main class="flex-1 p-6">
        <h2 class="font-bold">Управление клиентами</h2>
        <section class="mt-4">
            <div class="flex flex-row">
                <form action="/search" method="POST" class="flex flex-col">
                    @csrf
                    <div class="lastname m-3">
                        <label for="lastname">Поиск по фамилии</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Фамилия" class="border-1 rounded p-0.5">
                    </div>

                    <div class="group m-3">
                        <label for="group" class="mr-5">Поиск по группе</label>
                        <input type="text" name="groupInput" placeholder="Группа" class="border-1 rounded p-0.5">
                        <select name="groupSelection" id="group" class="border-1 rounded p-0.5">
                            <option value=""></option>
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="buttons flex flex-row">
                        <button type="submit" class="bg-gray-200 p-1 ml-60 rounded cursor-pointer w-30">Поиск</button>
                        @if (request()->path() == "search")
                        <a href="/clients" class="bg-gray-200 p-1 ml-5 rounded cursor-pointer w-30 text-center">Все</a>
                        @endif
                    </div>
                </form>

                <a href="/clients/new" class="ml-37 bg-green-600 text-white p-1.5 rounded h-8.5">Добавить клиента & Создать группу</a>
            </div>

            <table class="min-w-full divide-y divide-gray-200 mt-5 text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Фамилия</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Код доступа</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Группа</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clients as $client)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $loop->iteration }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $client->first_name }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $client->last_name }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $client->access_code }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $client->group?->group_name }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="inline-flex flex-wrap items-start">
                                <a class="mt-1 bg-blue-700 p-1.5 text-white rounded mr-3" href="/client/edit/{{ $client->id }}">Редактировать</a>
                                <a class="mt-1 bg-teal-600 p-1.5 text-white rounded mr-3" href="/client/view/{{ $client->id }}">Выбранные фотографии</a>
                                <a class="mt-1 bg-slate-600 p-1.5 text-white rounded mr-3" href="/client/addPhoto/{{ $client->id }}">Добавить фотографии в галлерею</a>
                                <a class="mt-1 bg-red-700 p-1.5 text-white rounded block" href="/client/delete/{{ $client->id }}" onclick="return confirm('Are you sure you want to delete this client?')">Удалить</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $clients->links() }}
            </div>
        </section>
    </main>
</div>
@endsection