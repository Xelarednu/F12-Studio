@extends("head")

@section("content")
<div class="min-h-screen bg-gray-900 flex flex-col items-center justify-center p-4">
    <h1 class="text-center mb-8 text-white">Фото из школьных выпускных альбомов</h1>
    <div class="pswp-gallery flex flex-wrap gap-4 justify-center" id="gallery">
        @foreach ($photos as $photo)
        <a href="{{ asset('images/examplePhotos/' . $photo['file_name']) }}" 
           data-pswp-width="{{ $photo['width'] }}" 
           data-pswp-height="{{ $photo['height'] }}"
           class="block overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('images/examplePhotos/' . $photo['file_name']) }}" 
                 alt="{{ $photo['file_name'] }}"
                 class="w-48 h-32 object-cover object-center">
        </a>
        @endforeach
    </div>
    <a href="/" class="bg-blue-700 p-1 rounded-md text-center fixed left-4 top-220 text-white">Назад</a>
</div>
@endsection