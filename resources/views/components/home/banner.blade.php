<section class="banner">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col md:flex-row">
            <div class="flex flex-col mx-3 my-3 overflow-auto max-h-52 md:h-96 md:max-h-96 basis-full md:basis-1/4">
                @foreach ($categories as $category)
                <a href="{{route('categories.showByName', ['id' => $category->id, 'name' => \App\Helpers\Utils::create_slug($category->name)])}}"
                    class="p-3 rounded-sm hover:bg-blue-100">{{$category->name}}</a>
                @endforeach

            </div>

            <div class="flex mx-3 my-3 basis-full md:basis-3/4">

                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        @foreach ($high_products as $product)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <a href="{{route('products.show', $product->id)}}">
                                <img src="{{$product->picture_url}}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </a>

                        </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-20 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        @foreach ($high_products as $key => $product)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                            aria-label="{{$product->name}}" data-carousel-slide-to="{{$key}}""></button>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type=" button"
                            class="absolute top-0 left-0 z-20 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 right-0 z-20 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>

                </div>

                <div class="flex flex-col h-full basis-full md:basis-1/4">
                    @guest
                    <div class="user-login flex flex-col mt-3 mx-3 bg-[#E3F0FF] rounded-md">
                        <div class="flex flex-row items-center m-3 info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <div class="pl-3">
                                <p>Hi User. </p>
                                <p>Let get started</p>
                            </div>
                        </div>
                        <a href="/register" class="p-1 mx-2 mb-2 text-center text-white bg-blue-500 rounded-md">Join
                            Now</a>
                        <a href="/login" class="p-1 mx-2 mb-2 text-center text-blue-400 bg-white rounded-md">Login</a>
                    </div>
                    @endguest
                    @auth
                    <div class="mx-3 mt-3 overflow-auto h-96">
                        @endauth
                        @guest
                        <div class="mx-3 mt-3 overflow-scroll h-52">
                            @endguest
                            @if (count($latest_orders) > 0)
                            @foreach ($latest_orders as $order)
                            <div class="p-2 border-b-2">
                                <p><span class="italic font-bold text-red-500">{{$order->customer->name}}</span> đã mua
                                    <span class="font-bold text-red-300">{{$order->quantity}}</span>
                                    <span class="font-bold text-blue-400">
                                        <a
                                            href="{{route('products.show', $order->product->id)}}">{{$order->product->name}}</a>
                                    </span>
                                </p>
                            </div>
                            @endforeach
                            @else
                            <div class="p-2 border-b-2">
                                <p>Chưa có giao dịch nào được ghi nhận.
                                </p>
                            </div>
                            @endif
                        </div>


                    </div>

                </div>
            </div>
</section>