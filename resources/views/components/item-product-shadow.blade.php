<a href="{{route('products.show', $product->id)}}">
    <div class="p-4 border border-gray-300 rounded-md shadow-md">
        <div class="relative">
            <div class="relative hidden">
                <img src="{{$product->picture_url}}" alt="{{ $product->name }}"
                    onload="this.parentElement.classList.remove('hidden'); $('#product-{{$product->id}}').remove()"
                    class="object-cover w-full h-48 mb-4 product-img">
                <div class="absolute top-0 right-0">
                    <span
                        class="inline-block px-2 py-1 mr-1 text-xs font-semibold uppercase rounded text-amber-600 bg-amber-200 last:mr-0">
                        {{$product->amount > 0 ? $product->amount : "Hết hàng"}}
                    </span>
                </div>
            </div>

            <div id="product-{{$product->id}}" class="absolute inset-0 flex items-center justify-center bg-gray-200">
                <svg class="w-6 h-6 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 0012 20c4.418 0 8-3.582 8-8h-4a4.001 4.001 0 01-3.865-3.133L8 9.833V17.29z">
                    </path>
                </svg>
            </div>
        </div>
        <h2 class="text-lg font-bold">{{ $product->name }}</h2>
        <p class="mb-2 text-gray-500">{{ $product->description }}</p>
        <div class="flex justify-between">
            <p class="text-lg font-bold">{{ number_format($product->price) }} VNĐ</p>
            @if ($product->status)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            @else
            <button type="button"
                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Liên
                hệ</button>
            @endif
        </div>
    </div>
</a>