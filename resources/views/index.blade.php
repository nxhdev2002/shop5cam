@include('layouts.header')
<div class="">
    <div class="mt-10 box-content ml-auto mr-auto max-w-6xl pl-6 pr-6">

        <div>
            <h4 class="min-w-0 text-2xl">Sản phẩm nổi bật</h4>
            <div class="mt-1 text-base pb-2 font-sans">Danh sách những sản phẩm theo xu hướng mà có thể bạn sẽ thích
            </div>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                @foreach ($products_quantity as $quantity)
                <a href="#">
                    <div class="border border-gray-300 rounded-md shadow-md p-4">
                        <img src="{{$quantity->picture_url}}" alt="" class="w-full h-48 object-cover mb-4">
                        <h2 class="text-lg font-bold">{{ $quantity->name }}</h2>
                        <p class="text-gray-500 mb-2">{{ $quantity->description }}</p>
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">${{$quantity->price}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div>
                <h4 class="min-w-0 pt-2 pb-2 text-2xl">
                    Sản phẩm có giá rẻ
                </h4>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    @foreach($products_cheap as $cheap)
                    <a href="">
                        <div class="border border-gray-300 rounded-md shadow-md p-4">
                            <img src="" alt="" class="w-full h-48 object-cover mb-4">
                            <h2 class="text-lg font-bold">{{ $cheap->name }}</h2>
                            <div class="flex justify-between">
                                <p class="text-lg font-base"></p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div>
                <h4 class="min-w-0 pt-2 pb-2 text-2xl">
                    10 sản phẩm đầu tiên
                </h4>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    @foreach($products_10first as $first)
                    <a href="">
                        <div class="border border-gray-300 rounded-md shadow-md p-4">
                            <img src="" alt="" class="w-full h-48 object-cover mb-4">
                            <h2 class="text-lg font-bold">{{ $first->name }}</h2>
                            <div class="flex justify-between">
                                <p class="text-lg font-base"></p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div>
                <h4 class="min-w-0 pt-2 pb-2 text-2xl">
                    Tên danh mục
                </h4>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

                    <a href="#">
                        <div class="border border-gray-300 rounded-md shadow-md p-4">
                            <img src="#" alt="" class="w-full h-48 object-cover mb-4">
                            <h2 class="text-lg font-bold">Tên sản phẩm</h2>
                            <div class="flex justify-between">
                                <p class="text-lg font-base">Giá VNĐ</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')