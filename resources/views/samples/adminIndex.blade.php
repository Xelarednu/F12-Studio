@extends("head")

@section("content")
<div class="min-h-screen bg-gray-800 text-white flex flex-col items-center py-10 px-4">
    <div class="temporary-contact-info flex items-center flex-col sm:flex-row justify-center p-5 max-w-3xl w-full bg-gray-700 rounded-lg mb-8 text-center ">
        <p class="m-2">+372 5066892</p>
        <p class="m-2">Фотограф Сергей Дроздик</p>
        <p class="m-2">foto.f12studio@gmail.com</p>
    </div>

    <div class="temporary-why-we flex items-center flex-col justify-center p-5 max-w-3xl w-full bg-gray-700 rounded-lg mb-8 text-center ">
        <h2>Огромный опыт</h2>
        <p>Мы делаем фотоальбомы в Нарве, Силламяэ и Йыхви уже более 10 лет. За долгие годы мы научились это
            делать хорошо и без ошибок 🙂 И мы знаем  всё  о том как это сделать лучше.</p>
    </div>

    <div class="temporary-why-we flex items-center flex-col justify-center p-5 max-w-3xl w-full bg-gray-700 rounded-lg mb-8 text-center ">
        <h2>Главная цель - хорошие фотографии</h2>
        <p>Самое главное - мы стараемся провести наши фото-сессии с хорошим настроением, чтобы в альбоме все
            фотографии радовали глаз, не только участников фото-сессии, но также их родных и друзей.</p>
    </div>

    <h1>Варианты выпускных школьных фото-книг:</h1>
    
    <div class="firstVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg mb-8 text-center">
        <form id="firstForm" action="/samples/1" method="POST">
            @csrf
            <h1 class="text-3xl font-bold mb-6">Вариант 1</h1>
            <h2 contenteditable="true" id="title" class="text-2xl mb-4">{{ $firstVariantContent->title }}</h2>
            <input type="hidden" id="hiddenTitle" name="title" />

            <h3 contenteditable="true" id="subTitle" class="text-xl mb-4">{{ $firstVariantContent->subTitle }}</h3>
            <input type="hidden" id="hiddenSubTitle" name="subTitle" />

            <p contenteditable="true" id="pages" class="mb-4"> {{ $firstVariantContent->pages }}</p>
            <input type="hidden" id="hiddenPages" name="pages" />

            <p class="mb-2">Фото-книга содержит:</p>
            <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
                @foreach ($firstVariantContent->insideAlbum as $index => $inside)
                <li contenteditable="true" id="albumInsides_{{ $index }}">{{ $inside }}</li>
                @endforeach
                <input type="hidden" id="hiddenAlbumInsides" name="albumInsides" />
            </ul>

            <p class="font-bold mb-2">В стомость фотокниги входит:</p>
            <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
                @foreach ($firstVariantContent->priceIncludes as $index => $price)
                <li contenteditable="true" id="priceIncludes_{{ $index }}">{{ $price }}</li>
                @endforeach
                <input type="hidden" id="hiddenPriceIncludes" name="priceIncludes" />
            </ul>

            <p contenteditable="true" id="albumPrice" class="mb-4">{{ $firstVariantContent->albumPrice }}</p>
            <input type="hidden" id="hiddenAlbumPrice" name="albumPrice" />

            <p contenteditable="true" id="albumExample">{{ $firstVariantContent->albumExample }}</p>
            <input type="hidden" id="hiddenAlbumExample" name="albumExample" />

            <div class="pswp-gallery" id="gallery">
                @foreach ($photos as $photo)
                @if ($photo["option_id"] == 1)
                <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
                @endforeach
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 transition duration-200 cursor-pointer">Save</button>
        </form>
    </div>

    <div class="secondVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg mb-8 text-center">
        <form id="secondForm" action="/samples/2" method="POST">
            @csrf
            <h1 class="text-3xl font-bold mb-6">Вариант 2</h1>

            <h2 contenteditable="true" id="title2" class="text-2xl mb-4">{{ $secondVariantContent->title }}</h2>
            <input type="hidden" id="hiddenTitle2" name="title2" />

            <h3 contenteditable="true" id="subTitle2" class="text-xl mb-4">{{ $secondVariantContent->subTitle }}</h3>
            <input type="hidden" id="hiddenSubTitle2" name="subTitle2" />

            <p contenteditable="true" id="pages2" class="mb-4"> {{ $secondVariantContent->pages }}</p>
            <input type="hidden" id="hiddenPages2" name="pages2" />

            <p class="font-bold mb-2">В стомость фотокниги входит:</p>
            <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
                @foreach ($secondVariantContent->priceIncludes as $index => $price)
                <li contenteditable="true" id="priceIncludes_2{{ $index }}">{{ $price }}</li>
                @endforeach
                <input type="hidden" id="hiddenPriceIncludes2" name="priceIncludes2" />
            </ul>

            <p contenteditable="true" id="albumPrice2" class="mb-4">{{ $secondVariantContent->albumPrice }}</p>
            <input type="hidden" id="hiddenAlbumPrice2" name="albumPrice2" />

            <p contenteditable="true" id="albumExample2">{{ $secondVariantContent->albumExample }}</p>
            <input type="hidden" id="hiddenAlbumExample2" name="albumExample2" />

            <div class="pswp-gallery" id="gallery">
                @foreach ($photos as $photo)
                @if ($photo["option_id"] == 2)
                <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
                @endforeach
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 transition duration-200 cursor-pointer">Save</button>
        </form>
    </div>

    <div class="thirdVariant pb-15 max-w-3xl w-full bg-gray-700 p-8 rounded-lg text-center">
        <form id="thirdForm" action="/samples/3" method="POST">
            @csrf
            <h1 class="text-3xl font-bold mb-6">Вариант 3</h1>

            <h2 contenteditable="true" id="title3" class="text-2xl mb-4">{{ $thirdVariantContent->title }}</h2>
            <input type="hidden" id="hiddenTitle3" name="title3" />

            <h3 contenteditable="true" id="subTitle3" class="text-xl mb-4">{{ $thirdVariantContent->subTitle }}</h3>
            <input type="hidden" id="hiddenSubTitle3" name="subTitle3" />

            <p contenteditable="true" id="hardPages" class="mb-4"> {{ $thirdVariantContent->hardPages }}</p>
            <input type="hidden" id="hiddenHardPages" name="hardPages" />

            <p contenteditable="true" id="hardPages2" class="mb-4"> {{ $thirdVariantContent->hardPages2 }}</p>
            <input type="hidden" id="hiddenHardPages2" name="hardPages2" />

            <p contenteditable="true" id="someText" class="mb-4"> {{ $thirdVariantContent->someText }}</p>
            <input type="hidden" id="hiddenSomeText" name="someText" />

            <p contenteditable="true" id="pages3" class="mb-4"> {{ $thirdVariantContent->pages }}</p>
            <input type="hidden" id="hiddenPages3" name="pages3" />

            <p class="font-bold mb-2">В стомость фотокниги входит:</p>
            <ul class="list-disc list-inside mb-6 text-left max-w-md mx-auto">
                @foreach ($thirdVariantContent->priceIncludes as $index => $price)
                <li contenteditable="true" id="priceIncludes_3{{ $index }}">{{ $price }}</li>
                @endforeach
                <input type="hidden" id="hiddenPriceIncludes3" name="priceIncludes3" />
            </ul>

            <p contenteditable="true" id="albumPrice3" class="mb-4">{{ $thirdVariantContent->albumPrice }}</p>
            <input type="hidden" id="hiddenAlbumPrice3" name="albumPrice3" />

            <p contenteditable="true" id="albumExample3">{{ $thirdVariantContent->albumExample }}</p>
            <input type="hidden" id="hiddenAlbumExample3" name="albumExample3" />

            <div class="pswp-gallery" id="gallery">
                @foreach ($photos as $photo)
                @if ($photo["option_id"] == 3)
                <a href="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" data-pswp-width="{{ $photo['width'] }}" data-pswp-height="{{ $photo['height'] }}" class="pb-5"><img src="{{ asset("images/samplePhotos/" . $photo["file_name"]) }}" alt="" class="pb-5"></a>
                @endif
                @endforeach
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 transition duration-200 cursor-pointer">Save</button>
        </form>
    </div>
    <a href="/" class="bg-blue-700 p-1 rounded-md text-center fixed left-4 top-220">Назад</a>
</div>

<script>
    document.getElementById('firstForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title').innerText;
        document.getElementById('hiddenTitle').value = title;

        const subTitle = document.getElementById('subTitle').innerText;
        document.getElementById('hiddenSubTitle').value = subTitle;

        const pages = document.getElementById('pages').innerText;
        document.getElementById('hiddenPages').value = pages;

        // Album insides
        let albumInsidesArr = [];

        for (let i = 0; i < {{ count((array) $firstVariantContent->insideAlbum) }}; i++) {
            const insideAlbumContent = document.getElementById('albumInsides_' + i);
            albumInsidesArr.push(insideAlbumContent.innerText);
        }

        document.getElementById('hiddenAlbumInsides').value = JSON.stringify(albumInsidesArr);
        // Album insides

        // Price includes
        let priceIncludesArr = [];

        for (let i = 0; i < {{ count((array) $firstVariantContent->priceIncludes) }}; i++) {
            const priceIncludesContent = document.getElementById('priceIncludes_' + i);
            priceIncludesArr.push(priceIncludesContent.innerText);
        }

        document.getElementById('hiddenPriceIncludes').value = JSON.stringify(priceIncludesArr);
        // Price includes

        const albumPrice = document.getElementById('albumPrice').innerText;
        document.getElementById('hiddenAlbumPrice').value = albumPrice;

        const albumExample = document.getElementById('albumExample').innerText;
        document.getElementById('hiddenAlbumExample').value = albumExample;
    });
</script>

<script>
    document.getElementById('secondForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title2').innerText;
        document.getElementById('hiddenTitle2').value = title;

        const subTitle = document.getElementById('subTitle2').innerText;
        document.getElementById('hiddenSubTitle2').value = subTitle;

        const hardPages = document.getElementById('hardPages').innerText;
        document.getElementById('hiddenHardPages').value = hardPages;

        const hardPages2 = document.getElementById('hardPages2').innerText;
        document.getElementById('hiddenHardPages2').value = hardPages2;

        const someText = document.getElementById('someText').innerText;
        document.getElementById('someText').value = someText;

        const pages = document.getElementById('pages2').innerText;
        document.getElementById('hiddenPages2').value = pages;

        // Price includes
        let priceIncludesArr = [];

        for (let i = 0; i < {{ count((array) $secondVariantContent->priceIncludes) }}; i++) {
            const priceIncludesContent = document.getElementById('priceIncludes_2' + i);
            priceIncludesArr.push(priceIncludesContent.innerText);
        }

        document.getElementById('hiddenPriceIncludes2').value = JSON.stringify(priceIncludesArr);
        // Price includes

        const albumPrice = document.getElementById('albumPrice2').innerText;
        document.getElementById('hiddenAlbumPrice2').value = albumPrice;

        const albumExample = document.getElementById('albumExample2').innerText;
        document.getElementById('hiddenAlbumExample2').value = albumExample;
    });
</script>

<script>
    document.getElementById('thirdForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title3').innerText;
        document.getElementById('hiddenTitle3').value = title;

        const subTitle = document.getElementById('subTitle3').innerText;
        document.getElementById('hiddenSubTitle3').value = subTitle;

        const hardPages = document.getElementById('hardPages').innerText;
        document.getElementById('hiddenHardPages').value = hardPages;

        const hardPages2 = document.getElementById('hardPages2').innerText;
        document.getElementById('hiddenHardPages2').value = hardPages2;

        const someText = document.getElementById('someText').innerText;
        document.getElementById('someText').value = someText;

        const pages = document.getElementById('pages3').innerText;
        document.getElementById('hiddenPages3').value = pages;

        // Price includes
        let priceIncludesArr = [];

        for (let i = 0; i < {{ count((array) $thirdVariantContent->priceIncludes) }}; i++) {
            const priceIncludesContent = document.getElementById('priceIncludes_3' + i);
            priceIncludesArr.push(priceIncludesContent.innerText);
        }

        document.getElementById('hiddenPriceIncludes3').value = JSON.stringify(priceIncludesArr);
        // Price includes

        const albumPrice = document.getElementById('albumPrice3').innerText;
        document.getElementById('hiddenAlbumPrice3').value = albumPrice;

        const albumExample = document.getElementById('albumExample3').innerText;
        document.getElementById('hiddenAlbumExample3').value = albumExample;
    });
</script>
@endsection