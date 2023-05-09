@include('layouts.header')
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="{{ $product->name }}"
                class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                src="{{$product->picture_url}}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-base font-bold text-gray-900 ">Danh mục: {{$category->name}}</h2>
                <p class="font-bold text-2xl">Mã sản phẩm: {{$product->id}}</p>
                <h1 class=" font-bold text-3xl"> Tên sản phẩm: {{ $product->name }}</h1>
                <div class="flex mb-4">
                    <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <span class="text-gray-600 ml-3">4 Reviews</span>
                    </span>

                </div>
                <p class="leading-relaxed">{{$product->description}}</p>




                <div class="flex items-end">
                    <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price}}</span>
                    <button
                        class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                        <div>
                            Mua Ngay
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                    </button>

                </div>
            </div>
        </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 py-8 bg-white">
        <p class="font-bold text-2xl">Người bán: {{$seller->name}}</p>
    </div>
    <div class="max-w-4xl mx-auto px-4 py-8 bg-white">
        <p class="font-bold text-2xl">Chi tiết sản phẩm</p>
        <div>
            <h1>Mã sản phẩm: {{$product->id}}</h1>
            <h2>Danh mục: {{$category->name}}</h2>
            <h3>Tên sản phẩm: {{ $product->name }}</h3>
        </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 py-8 bg-white">
        <p class="font-bold text-2xl">Đánh giá sản phẩm</p>
        <div class="grid grid-rows-3">
            <div>fb1</div>
            <div>fb2</div>
            <div>fb3</div>
        </div>
    </div>
</section>
@include('layouts.footer')