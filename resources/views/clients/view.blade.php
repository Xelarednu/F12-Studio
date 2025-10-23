@extends("layouts.dashboardLayout")

@section("pageContent")
<div class="flex flex-col md:flex-row">
    <main class="flex-1 p-6">
        <h2 class="font-bold">Фотографии выбранные {{ $client->first_name }} {{ $client->last_name }}</h2>
        <section class="mt-4 w-200">
            <table class="min-w-full divide-y divide-gray-200 mt-5">
                <thead class="bg-gray-50 text-center">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Имя файла</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Фотография</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 text-center">
                    @foreach ($photos as $photo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $loop->iteration }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="mt-1">{{ $photo["file_name"] }}</p>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="pswp-gallery flex flex-wrap gap-4 justify-center" id="gallery">
                                <a href="{{ asset('images/clientPhotos/' . $photo['file_name']) }}"
                                    data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}"
                                    class="block overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <img src="{{ asset('images/clientPhotos/' . $photo['file_name']) }}"
                                        alt="{{ $photo['file_name'] }}" class="w-48 h-32 object-cover object-center">
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $photos->links() }}
            </div>
            <a href="/clients" class="bg-gray-600 text-white p-2 rounded">Назад</a>
        </section>
    </main>
</div>
@endsection