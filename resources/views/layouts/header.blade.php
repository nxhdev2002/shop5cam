<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}} - {{env("SITE_NAME")}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-slate-100">
    <div class="header-2">
        <nav class="py-2 bg-white md:py-4">
            <div class="container px-4 mx-auto md:flex md:items-center">
                <div class="flex items-center justify-between">
                    <a href="#" class="text-xl font-bold text-orange-600">{{env("SITE_NAME")}}</a>
                    <button
                        class="px-3 py-1 text-gray-600 border border-gray-600 border-solid rounded opacity-50 hover:opacity-75 md:hidden"
                        id="navbar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <div class="flex-col hidden mt-3 md:flex md:flex-row md:ml-auto md:mt-0" id="navbar-collapse">
                    <a href="/" class="p-2 text-white bg-orange-600 rounded lg:px-4 md:mx-2">Trang chủ</a>
                    <a href="/product"
                        class="p-2 text-gray-600 transition-colors duration-300 rounded lg:px-4 md:mx-2 hover:bg-gray-200 hover:text-gray-700">Sản
                        Phẩm</a>
                    <a href="#"
                        class="p-2 text-gray-600 transition-colors duration-300 rounded lg:px-4 md:mx-2 hover:bg-gray-200 hover:text-gray-700">Name</a>
                    <a href="#"
                        class="p-2 text-gray-600 transition-colors duration-300 rounded lg:px-4 md:mx-2 hover:bg-gray-200 hover:text-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#"
                        class="p-2 text-gray-600 transition-colors duration-300 rounded lg:px-4 md:mx-2 hover:bg-gray-200 hover:text-gray-700"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>

                    </a>

                    @guest
                    <a href="/login"
                        class="p-2 text-center transition-colors duration-300 border border-transparent rounded lg:px-4 md:mx-2 text-oraneg-600 hover:bg-indigo-100 hover:text-orange-700">Login</a>
                    <a href="#"
                        class="p-2 mt-1 text-center text-orange-600 transition-colors duration-300 border border-orange-600 border-solid rounded lg:px-4 md:mx-2 hover:bg-orange-600 hover:text-white md:mt-0 md:ml-1">Signup</a>
                    @endguest
                    @auth
                    <a href="#"
                        class="p-2 text-center transition-colors duration-300 border border-transparent rounded lg:px-4 md:mx-2 text-oraneg-600 hover:bg-indigo-100 hover:text-orange-700">Hello
                        {{auth()->user()->name}}</a>
                    @endauth
                </div>
            </div>
        </nav>
        <!-- @include('layouts.nav') -->
    </div>