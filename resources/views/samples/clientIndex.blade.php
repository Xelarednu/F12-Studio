@extends("head")

@section("content")
<div class="min-h-screen bg-gray-800 text-white flex flex-col items-center py-10 px-4">
    <div class="firstVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg mb-8 text-center">
        <h1 class="text-3xl font-bold mb-6">Вариант 1</h1>
        <h2 class="text-2xl mb-4">{{ $firstVariantContent->title }}</h2>

        <h3 class="text-xl mb-4">{{ $firstVariantContent->subTitle }}</h3>

        <p class="mb-4"> {{ $firstVariantContent->pages }}</p>

        <p class="mb-2">В альбоме будет:</p>
        <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
            @foreach ($firstVariantContent->insideAlbum as $inside)
            <li>{{ $inside }}</li>
            @endforeach
        </ul>

        <p class="font-bold mb-2">В стомость фотокниги входит:</p>
        <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
            @foreach ($firstVariantContent->priceIncludes as $price)
            <li>{{ $price }}</li>
            @endforeach
        </ul>

        <p class="mb-4">{{ $firstVariantContent->albumPrice }}</p>

        <p>{{ $firstVariantContent->albumExample }}</p>

        <div class="pswp-gallery" id="gallery">
            @foreach ($photos as $photo)
                @if ($photo["option_id"] == 1)
                    <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="secondVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg mb-8 text-center">
        <h1 class="text-3xl font-bold mb-6">Вариант 2</h1>

        <h2 class="text-2xl mb-4">{{ $secondVariantContent->title }}</h2>

        <h3 class="text-xl mb-4">{{ $secondVariantContent->subTitle }}</h3>

        <p class="mb-4"> {{ $secondVariantContent->pages }}</p>

        <p class="font-bold mb-2">В стомость фотокниги входит:</p>
        <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
            @foreach ($secondVariantContent->priceIncludes as $price)
            <li>{{ $price }}</li>
            @endforeach
        </ul>

        <p class="mb-4">{{ $secondVariantContent->albumPrice }}</p>

        <p>{{ $secondVariantContent->albumExample }}</p>

        <div class="pswp-gallery" id="gallery">
            @foreach ($photos as $photo)
                @if ($photo["option_id"] == 2)
                    <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="thirdVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg text-center">
        <h1 class="text-3xl font-bold mb-6">Вариант 3</h1>

        <h2 class="text-2xl mb-4">{{ $thirdVariantContent->title }}</h2>

        <h3 class="text-xl mb-4">{{ $thirdVariantContent->subTitle }}</h3>

        <p class="mb-4"> {{ $thirdVariantContent->hardPages }}</p>

        <p class="mb-4"> {{ $thirdVariantContent->hardPages2 }}</p>

        <p class="mb-4"> {{ $thirdVariantContent->someText }}</p>

        <p class="mb-4"> {{ $thirdVariantContent->pages }}</p>

        <p class="font-bold mb-2">В стомость фотокниги входит:</p>
        <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
            @foreach ($thirdVariantContent->priceIncludes as $price)
            <li>{{ $price }}</li>
            @endforeach
        </ul>

        <p class="mb-4">{{ $thirdVariantContent->albumPrice }}</p>

        <p>{{ $thirdVariantContent->albumExample }}</p>

        <div class="pswp-gallery" id="gallery">
            @foreach ($photos as $photo)
                @if ($photo["option_id"] == 3)
                    <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
            @endforeach
        </div>
    </div>

    <a href="/" class="bg-blue-700 p-1 rounded-md text-center fixed left-4 top-220">Назад</a>
</div>
@endsection