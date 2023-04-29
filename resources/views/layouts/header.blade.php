<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div class="header-2">
        <nav class="bg-white py-2 md:py-4">
            <div class="container px-4 mx-auto md:flex md:items-center">
                <div class="flex justify-between items-center">
                    <a href="#" class="font-bold text-xl text-orange-600">Shop5Cam</a>
                    <button
                        class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
                        id="navbar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
                    <a href="#" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-orange-600">Trang chủ</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Sản
                        Phẩm</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Name</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Name</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Name</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-oraneg-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-orange-700 transition-colors duration-300">Login</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-orange-600 text-center border border-solid border-orange-600 rounded hover:bg-orange-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Signup</a>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>