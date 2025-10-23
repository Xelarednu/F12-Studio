@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    <main class="flex-1 p-6">
        <h2 class="font-bold">Управление услугами</h2>
        <section class="mt-4">
            <table class="min-w-full divide-y divide-gray-200 mt-5 text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Заголовок</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Текст</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($services as $service)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $loop->iteration }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $service->heading }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap max-w-100 overflow-scroll">
                            <p class="mt-1">{{ $service->text }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="inline-flex flex-wrap items-start">
                                <a class="mt-1 bg-blue-700 p-1.5 text-white rounded mr-3" href="/service/edit/{{ $service->id }}">Редактировать</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection