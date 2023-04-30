@include('layouts.header')
@include('layouts.nav')
<div class="md mx-auto px-4 py-8 bg-white">
    <p class="font-bold text-2xl">Chi tiết sản phẩm</p>
    <div class="grid grid-cols-2 gap-4">
        <div class="w-64 h-64 m-3 border border-gray-900"><img src="{{$product->picture_url}}"
                alt="{{ $product->name }}" class="w-full h-48 object-cover ">
        </div>
        <div class="w-auto h-48 m-3 border border-gray-900 ">
            <p class="font-bold text-2xl">Mã sả phẩm: {{$product->id}} Mã danh mục: {{$product->category_id}}</p>
            <h2 class="text-lg font-bold">Tên sản phẩm: {{ $product->name }}</h2>
            <p class="text-black mb-2"> Mô Tả: {{ $product->description }}</p>

            <div class="flex justify-between">
                <p class="text-lg font-bold">Giá sản phẩm: {{ number_format($product->price) }} VNĐ</p>
            </div>
            <p> Số lượng sản phẩm : {{$product->amount}}</p>
            <div class="grid grid-cols-2">
                <p class="font-bold text-base">Người bán: {{}}</p>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')