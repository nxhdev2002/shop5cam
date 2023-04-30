<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="header-2">
        <nav class="bg-white py-2 md:py-4">
            <div class="container px-4 mx-auto md:flex md:items-center">
                <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
                    <a href="" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-orange-400">Trang
                        chủ</a>
                    <a href="/product"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Sản
                        Phẩm</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Giỏ
                        Hàng</a>
                    <a href="#"
<<<<<<< HEAD
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"></a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Name</a>
=======
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
>>>>>>> dc4d0d2281de883ac5c4e475e23a89aa30ce7223

                    @guest
                    <a href="/login"
                        class="p-2 lg:px-4 md:mx-2 text-oraneg-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-orange-700 transition-colors duration-300">Login</a>
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-orange-600 text-center border border-solid border-orange-600 rounded hover:bg-orange-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Signup</a>
                    @endguest
                    @auth
                    <a href="#"
                        class="p-2 lg:px-4 md:mx-2 text-oraneg-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-orange-700 transition-colors duration-300">Hello
                        {{auth()->user()->name}}</a>
                    @endauth
                </div>
            </div>
        </nav>
<<<<<<< HEAD
=======
        <!-- @include('layouts.nav') -->
>>>>>>> dc4d0d2281de883ac5c4e475e23a89aa30ce7223
    </div>