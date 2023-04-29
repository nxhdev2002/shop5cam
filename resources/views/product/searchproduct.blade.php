@include('layouts.header')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Tìm kiếm sản phẩm</h1>
    <form action="{{ route('search') }}" method="GET">
        <div class="flex items-center border border-gray-300 rounded-md py-2 px-4 mb-4">
            <input type="text" name="q" class="w-full outline-none text-gray-700"
                placeholder="Nhập từ khóa tìm kiếm...">
            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 ml-4">Tìm kiếm</button>
        </div>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
        <div class="border border-gray-300 rounded-md shadow-md p-4">
            <img src="#" alt="#" class="w-full h-48 object-cover mb-4">
            <h2 class="text-lg font-bold">{{ $product->name }}</h2>
            <p class="text-gray-500 mb-2">{{ $product->description }}</p>
            <p class="text-lg font-bold">{{ number_format($product->price) }} VNĐ</p>
        </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')