@extends("head")

@section("content")
<div class="main-page container mx-auto min-w-full">
    @if(session()->has("success"))
    <div class="success-popup">{{ session("success") }}</div>
    @endif

    @error('error')
    <div class="error-popup">{{ $message }}</div>
    @enderror

    <div class="first-screen-nav relative min-h-screen w-full">
        <div class="absolute inset-0 -z-10 w-screen">
            <img src="{{ asset("images/backgroundPhoto.webp") }}" alt="background" class="w-full h-full object-cover">
        </div>

        <header class="flex items-center justify-between flex-col xl:flex-row text-white lg:ml-50 lg:mr-30 pt-5">
            <div class="logo-name flex items-center space-x-2">
                <img class="w-[3.5rem] h-[3.5rem] mr-6" src="{{ asset("images/F12 Logo 2.svg") }}" alt="logo">
                <p class="text-xl whitespace-nowrap">F12 Studio</p>
            </div>

            <nav class="flex items-center space-x-4 pt-[2rem] xl:pt-0">
                <a href="/photoExamples" class="text-xl font-semibold">Примеры</a>
                <a href="/samples" class="text-xl font-semibold">Образцы</a>
                <a href="{{ route('client.login') }}" class="lg:pr-24 mr-0 text-xl font-semibold max-w-[122px] lg:max-w-full sm:whitespace-nowrap">Выбор фотографий</a>
                @if (session("admin_auth") == true)
                <a href="/dashboard" class="text-xl font-semibold hidden lg:block">Админ панель</a>
                @else
                <a href="{{ route('admin.login') }}" class="text-xl font-semibold hidden lg:block">Вход</a>
                @endif
            </nav>
        </header>

        <div class="first-screen text-white flex flex-col justify-center sm:flex-row lg:justify-normal">
            <div class="social-media-links flex flex-col hidden lg:block max-w-[25rem] my-auto m-10">
                <div class="vertical-line rounded mx-auto hidden lg:block"></div>
                <a href="/"><img src="{{ asset("images/instagram.png") }}" class="w-8 h-8 mx-auto m-2" alt="icon"></a>
                <a href="/"><img src="{{ asset("images/vk.png") }}" class="w-8 h-8 mx-auto m-2" alt="icon"></a>
                <a href="/"><img src="{{ asset("images/facebook.png") }}" class="w-8 h-8 mx-auto m-2" alt="icon"></a>
                <div class="vertical-line rounded mx-auto hidden lg:block"></div>
            </div>

            <div class="sections flex flex-col pt-[5rem] pb-[5rem] sm:pb-0">
                <section class="greetings mb-30 flex flex-col items-center">
                    <h1 class="text-center">Вас приветствует фотостудия F12 Studio</h1>
                    <p class="max-w-[32.5rem] m-[1.25rem] mt-0 break-words">Наша главная цель проста: создавать качественные фотографии. Будь то мимолетный
                        момент, веха или суть того, кем вы являетесь. Мы здесь, чтобы превратить ваше видение в вечное
                        искусство.</p>
                    <a href="#services" class="inline-block group">
                        <div class="border-5 border-solid border-[#FFB85F] w-64 flex items-center justify-center backdrop-blur-xl bg-black/30 fill-button">
                            <p class="text-2xl text-[#FFB85F] pt-4 pb-4 w-full text-center transition-colors duration-300 group-hover:text-black relative z-10">Услуги</p>
                        </div>
                    </a>
                </section>

                <section class="photo-choose-transition flex flex-col items-center">
                    <h1 class="text-center">Переход на страницу выбора фотографий</h1>
                    <p class="max-w-[31.25rem] m-5 mt-0 break-words">Если вы уже сфотографировались и получили код от фотографа, то переходите на
                        страницу выбора фотографий по кнопке ниже.</p>
                    <a href="{{ route('client.login') }}" class="inline-block group">
                        <div class="border-5 border-solid border-[#FFB85F] w-64 flex items-center justify-center backdrop-blur-xl bg-black/30 fill-button">
                            <p class="text-2xl text-[#FFB85F] pt-4 pb-4 w-full text-center transition-colors duration-300 group-hover:text-black relative z-10">Выбор фотографий</p>
                        </div>
                    </a>
                </section>

                <a href="#" class="back-to-top hidden xl:block">
                    <svg class="w-8 h-8 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </a>
            </div>

            <a href="#second_screen" class="hidden md:block">
                <svg class="w-8 h-8 text-white absolute top-17/18 left-1/2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9" />
                </svg>
            </a>
        </div>
    </div>

    <main>
        <div class="second-screen flex flex-col items-center text-center p-[8.75rem] relative min-h-screen" id="second_screen">
            <div class="absolute inset-0 -z-10 w-full h-full overflow-hidden">
                <img src="{{ asset("images/Background pattern.jpg") }}" loading="lazy" alt="backgroundPattern" class="w-full h-full object-cover">
            </div>

            <div class="horizontal-line !w-70 !bg-black !m-0 absolute left-50 top-25 transform -translate-y-1/2 hidden xl:block"></div>
            <div class="horizontal-line !w-93 !bg-black !m-0 absolute right-50 top-235 transform -translate-y-1/2 hidden xl:block"></div>

            <div class="vertical-line !h-78 !bg-black !m-0 absolute right-50 top-85 transform -translate-y-1/2 hidden xl:block"></div>
            <div class="vertical-line !h-100 !bg-black !m-0 absolute left-30 top-150 transform -translate-y-1/2 hidden xl:block"></div>

            <div class="wrapper-container relative">
                <h1 class="max-w-[30rem] sm:max-w-[82.5rem] break-words">Фотоальбомы у нас заказывают потому что:</h1>

                <div class="cards flex flex-wrap items-center text-center justify-center max-w-[82.5rem]">
                    <section class="huge-experience max-w-90 sm:h-60 bg-gray-300/30 p-5 m-10 rounded-2xl">
                        <h2>Огромный опыт</h2>
                        <p>Мы делаем фотоальбомы в Нарве, Силламяэ и Йыхви уже более 10 лет. За долгие годы мы научились это
                            делать хорошо и без ошибок 🙂 И мы знаем  всё  о том как это сделать лучше.</p>
                    </section>

                    <section class="photo-choose max-w-90 sm:h-65 bg-gray-300/30 p-5 m-10 rounded-2xl">
                        <h2 class="whitespace-nowrap">Выбор фотографий</h2>
                        <p>Выбор фотографий, которые пойдут в альбом вы делаете сами прямо на съёмке. Для этого фотограф
                            берёт на съёмку планшет или ноутбук. Также есть возможность выбрать фотографии в нашей закрытой
                            онлайн-галерее.</p>
                    </section>

                    <section class="own-studio max-w-90 h-80 sm:h-65 bg-gray-300/30 p-5 m-10 rounded-2xl">
                        <h2>Своя студия</h2>
                        <p>Если кто-то не смог присутствовать на съёмке, то можно придти в нашу студию и сделать портретную
                            фотографию с таким же студийным освещением, как и на съёмке в помещении. А может и лучше 🙂</p>
                    </section>

                    <section class="main-goal max-w-115 h-90 sm:h-50 bg-gray-300/30 p-5 m-10 rounded-2xl">
                        <h2 class="sm:whitespace-nowrap">Главная цель - хорошие фотографии</h2>
                        <p>Самое главное - мы стараемся провести наши фото-сессии с хорошим настроением, чтобы в альбоме все
                            фотографии радовали глаз, не только участников фото-сессии, но также их родных и друзей.</p>
                    </section>
                </div>
                <h3 class="text-xl max-w-[30rem] sm:max-w-[82.5rem] break-words">Как выглядят выпускные альбомы можно посмотреть на странице образцов</h3>
                <a href="/samples" class="photo-example m-6 text-xl p-2 bg-white/80 drop-shadow-xl border border-black/50">Образцы</a>
            </div>
        </div>

        <div class="services-photos relative min-h-screen w-full pt-30 pb-30" id="services">
            <div class="absolute inset-0 -z-10 w-full h-full overflow-hidden">
                <img src="{{ asset("images/Background pattern 2.png") }}" loading="lazy" alt="backgroundPattern" class="w-full h-full object-cover">
            </div>
            <div class="services text-white flex flex-col items-center mb-25">
                <h1>Услуги</h1>

                <div class="services-cards flex flex-row justify-center flex-wrap text-black">
                    @foreach ($services as $service)
                    <section class="services-{{ $loop->iteration }} max-w-[20rem] m-10 p-5 bg-gray-300/60 text-justify">
                        <h2 class="text-center">{{ $service->heading }}</h2>
                        <p class="text-left">{{ $service->text }}</p>
                    </section>
                    @endforeach
                </div>
            </div>

            <div class="some-photos grid gap-4 w-full px-4 text-white">
                <div class="line-photos flex w-full items-center hidden">
                    <div class="horizontal-line flex-grow !bg-[#D66939]"></div>
                    <h2 class="photos-h2 whitespace-nowrap mr-50">Некоторые фотографии из альбомов</h2>
                </div>

                <div class="carousel w-full max-w-4xl mx-auto hidden">
                    <div id="default-carousel" class="relative" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full">
                                    <img src="{{ asset('images/examplePhotos/0LbMLNmuWic.jpg') }}"
                                        class="w-148 h-128 object-cover object-center rounded-lg" loading="lazy"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full">
                                    <img src="{{ asset('images/examplePhotos/2m5-BqCFHjI.jpg') }}"
                                        class="w-148 h-128 object-cover object-center rounded-lg" loading="lazy"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full">
                                    <img src="{{ asset('images/examplePhotos/5afGrPVh1cc.jpg') }}"
                                        class="w-148 h-128 object-cover object-center rounded-lg" loading="lazy"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full">
                                    <img src="{{ asset('images/examplePhotos/7ah9JoVaqzo.jpg') }}"
                                        class="w-148 h-128 object-cover object-center rounded-lg" loading="lazy"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="flex items-center justify-center h-full">
                                    <img src="{{ asset('images/examplePhotos/DNjWaz9z0U0.jpg') }}"
                                        class="w-148 h-128 object-cover object-center rounded-lg" loading="lazy"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                                data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                                data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                                data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                                data-carousel-slide-to="4"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <a href="/photoExamples" class="more-photos text-white bg-[#D66939] text-center px-6 py-3 rounded mt-4 max-w-2xl mx-auto hidden">
                    Больше фотографий
                </a>
                <a href="/photoExamples" class="photo-examples text-white bg-[#D66939] text-center px-6 py-3 rounded mt-4 max-w-2xl mx-auto">
                    Фотографии примеры
                </a>
            </div>
        </div>

        <div class="send-us-message flex flex-col items-center relative min-h-200">
            <div class="absolute inset-0 -z-10 w-full h-full overflow-hidden">
                <img src="{{ asset("images/photo-camera.webp") }}" alt="photo-camera" class="w-full h-full object-cover">
            </div>

            <div class="line-message w-full flex items-center pt-15 justify-center lg:justify-normal">
                <h2 class="text-[#D66939] whitespace-nowrap lg:ml-50 sm:ml-5 !mb-0">Отправить нам сообщение</h2>
                <div class="horizontal-line flex-grow !bg-[#D66939] ml-40 !mr-0 hidden md:flex"></div>
            </div>

            <form class="flex flex-col items-center justify-center gap-10 mt-24" action="/send-message" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Е-майл" class="min-w-[24rem] md:min-w-128 min-h-18" required />
                <textarea name="message" placeholder="Ваше сообщение" class="bg-white min-w-[24rem] md:min-w-128 min-h-48" required></textarea>
                <button type="submit" class="bg-[#D66939] text-white p-3 min-w-38 cursor-pointer ">Отправить</button>
            </form>
        </div>

        <footer class="footer flex flex-col items-center justify-center gap-8 lg:gap-32 w-full text-white bg-[#13131A] min-h-28">
            <div class="logo-name flex flex-row items-center">
                <img class="w-14 h-14 mr-6" loading="lazy" src="{{ asset("images/F12 Logo 2.svg") }}" alt="logo">
                <p class="text-xl sm:whitespace-wrap md:whitespace-nowrap">F12 Studio</p>
            </div>

            <div class="icons-number flex flex-wrap items-center justify-center gap-3 max-w-28 whitespace-nowrap">
                <a href="/"><img src="{{ asset("images/instagram.png") }}" class="w-6 h-6 mx-auto m-2" alt="icon"></a>
                <a href="/"><img src="{{ asset("images/vk.png") }}" class="w-6 h-6 mx-auto m-2" alt="icon"></a>
                <a href="/"><img src="{{ asset("images/facebook.png") }}" class="w-6 h-6 mx-auto m-2" alt="icon"></a>
                <p>+372 5066892</p>
            </div>

            <a href="#services" class="bg-[#D66939] pt-2 pb-2 pr-14 pl-14">Услуги</a>

            <div class="stuff flex flex-row gap-5 whitespace-nowrap">
                <p>Privacy policy</p>
                <p>Rights reserved</p>
            </div>
        </footer>
    </main>
</div>
@endsection