@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    <main class="flex-1 p-6">
        <h2 class="font-bold">Управление фотографиями на странице образцов</h2>
        <section class="mt-4">
            @for ($i = 1; $i <= 3; $i++)
                <h3>Фотографии варианта {{ $i }}</h3>
                <table class="min-w-full divide-y divide-gray-200 mt-5 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Имя файла</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Фотография</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($photos as $photo)
                        @if ($photo->option_id == $i)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="mt-1">{{ $loop->iteration }}</p>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="mt-1">{{ $photo->file_name }}</p>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="pswp-gallery flex flex-wrap gap-4 justify-center" id="gallery">
                                    <a href="{{ asset('images/samplePhotos/' . $photo['file_name']) }}"
                                        data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}"
                                        class="block overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                        <img src="{{ asset('images/samplePhotos/' . $photo['file_name']) }}"
                                            alt="{{ $photo['file_name'] }}" class="w-48 h-32 object-cover object-center">
                                    </a>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="inline-flex flex-wrap items-start">
                                    <a class="mt-1 bg-red-700 p-1.5 text-white rounded block" href="/sample/delete/{{ $photo->id }}" onclick="return confirm('Are you sure you want to delete this client?')">Удалить</a>
                                </div>
                            </td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>

                <form method="POST" action="/samples/upload/{{ $photos[$i]->option_id }}" enctype="multipart/form-data" class="m-10">
                    @csrf
                    <div>
                        <label class="text-xl">Выберите фото для загрузки:</label>
                        <input type="file" name="photos[]" class="bg-gray-200 rounded p-1 m-2 hover:bg-gray-300" multiple
                            accept="image/*">
                    </div>

                    <button type="submit" class="bg-green-600 text-white p-1.5 rounded cursor-pointer">Загрузить</button>
                </form>
                @endfor
        </section>
    </main>
</div>
@endsection