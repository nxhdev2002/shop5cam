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
                <p class="text-lg font-bold">{{ number_format($product->price) }} VNĐ</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
<p class="text-xs">{{ $products->links() }}</p>
@include('layouts.footer')