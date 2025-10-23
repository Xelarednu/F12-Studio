@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    @if(session()->has("success"))
    <div class="success-popup">{{ session("success") }}</div>
    @endif

    @error('group_not_found')
    <div class="error-popup">{{ $message }}</div>
    @enderror
    <main class="flex-1 p-6">
        <h2 class="font-bold">Управление услугами</h2>
        <section class="mt-4">
            <form action="/service/edit/{{ $service->id }}" method="POST">
                @csrf
                <table class="min-w-full divide-y divide-gray-200 mt-5 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Заголовок</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Текст</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input class="mt-1" value="{{ $service->heading }}" name="heading">
                            </td>

                            <td class="px-6 py-4 max-w-100 overflow-scroll">
                                <input class="mt-1 max-w-100 overflow-scroll" value="{{ $service->text }}" name="text">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="/services" class="bg-gray-600 text-white p-2 rounded">Назад</a>
                <button type="submit" class="mt-5 bg-green-600 text-white p-1.5 rounded cursor-pointer">Сохранить измененния</button>
            </form>
        </section>
    </main>
</div>
@endsection