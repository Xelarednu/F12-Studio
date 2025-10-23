@extends("head")

@section("content")
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Галерея</h1>
            @if ($client_info != null)
            <p class="text-lg text-gray-600">Добро пожаловать, {{ $client_info->first_name }} {{ $client_info->last_name }}</p>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Выбор фотографий:</h2>

            <form action="/gallery" method="POST" class="space-y-6">
                @csrf
                <div class="pswp-gallery grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6" id="gallery">
                    @foreach ($photos as $photo)
                    <div>
                        <a href="{{ asset('images/clientPhotos/' . $photo['file_name']) }}"
                            data-pswp-width="{{ $photo['width'] }}"
                            data-pswp-height="{{ $photo['height'] }}"
                            class="block overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('images/clientPhotos/' . $photo['file_name']) }}"
                                alt="{{ $photo['file_name'] }}"
                                class="w-full h-32 object-cover object-center">
                        </a>

                        <div class="mt-2 flex justify-center">
                            <input type="checkbox"
                                name="selected_photos[]"
                                value="{{ $photo['id'] }}"
                                class="h-5 w-5 text-blue-600 rounded focus:ring-blue-500">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $photos->links() }}
                </div>
                
                <div class="flex justify-center mt-24 mb-12">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center font-medium cursor-pointer transition-colors duration-200">
                        Подтвердить выбор
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <form action="{{ route('client.logout') }}" method="GET">
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm px-5 py-2.5 text-center font-medium cursor-pointer transition-colors duration-200">
                Выход
            </button>
        </form>
    </div>
</div>
</div>
@endsection