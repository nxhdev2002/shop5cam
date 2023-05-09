@include('layouts.header')
<div class="container mx-auto px-4 py-8">
    <span class="inline-block font-bold text-red-500 animate-blink">Danh sách sản phẩm</span>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach ($products as $product)
        <a href="/product/{{$product->id}}">
            <div class="border border-gray-300 rounded-md shadow-md p-4">
                <img src="{{$product->picture_url}}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                <p class="text-gray-500 mb-2">{{ $product->description }}</p>
                <div class="flex justify-between">
                    <p class="text-lg font-bold">{{ number_format($product->price) }} VNĐ</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<p class="text-xs">{{ $products->links()}}</p>
@include('layouts.footer')