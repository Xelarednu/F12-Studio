@extends("head")

@section("content")
    <body class="bg-gray-100 min-h-screen">
        <div class="flex flex-col md:flex-row">
            <aside class="w-full md:w-1/6 bg-gray-800 text-white min-h-screen">
                <div class="p-6 text-center font-bold text-xl border-b border-gray-700">
                    <a href="/dashboard" class="block py-2 px-4 hover:bg-gray-700 rounded">Админ панель</a>
                </div>
                <nav class="p-4">
                    <ul class="space-y-2">
                        <li><a href="/clients" class="block py-2 px-4 hover:bg-gray-700 rounded">Клиенты</a></li>
                        <li><a href="/examples" class="block py-2 px-4 hover:bg-gray-700 rounded">Примеры</a></li>
                        <li><a href="/services" class="block py-2 px-4 hover:bg-gray-700 rounded">Услуги</a></li>
                        <li><a href="/admin/examples" class="block py-2 px-4 hover:bg-gray-700 rounded">Образцы</a></li>
                        <li><a href="/profile" class="block py-2 px-4 hover:bg-gray-700 rounded">Профиль</a></li>
                        <li><a href="/" class="block py-2 px-4 hover:bg-gray-700 rounded">Назад на главную страницу</a></li>
                        <li><a href="{{ route('admin.logout') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Выйти из аккаунта администратора</a></li>
                    </ul>
                </nav>
            </aside>
            @yield("pageContent")
        </div>
    </body>
@endsection