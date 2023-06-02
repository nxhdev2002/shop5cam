<div class="flex items-center justify-between p-4 m-4 transition-opacity duration-300 border-b border-gray-300 opacity-100"
    id="product-{{$cart->product->id}}">
    <div class="flex items-center flex-grow-0 flex-shrink-0">
        <img class="w-16 h-16 mr-4 rounded" src="{{$cart->product->picture_url}}" alt="{{$cart->product->name}}">
    </div>
    <div class="flex-grow flex-shrink-1 flex-basis-0">
        <a href="{{route('products.show', $cart->product->id)}}">
            <h3 class="text-lg font-medium text-gray-900">{{$cart->product->name}}</h3>

            <p class="text-gray-600">{{number_format($cart->product->price)}} VNĐ</p>
            <div>Tình trạng:
                @if ($cart->product->amount > 0)
                <span class="text-green-600">Còn hàng</span>
                @else
                <span class="text-red-600">Hết hàng</span>
                @endif
            </div>
        </a>
    </div>
    <div class="flex items-center flex-grow-0 flex-shrink-0">
        <p class="mx-4 text-gray-600">{{number_format($cart->quantity * $cart->product->price)}} VNĐ</p>
        <button onclick="minusQuantity('{{$cart->product->id}}')"
            class="px-4 py-1 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:bg-gray-300">-</button>
        <span class="mx-2 font-medium text-gray-700"
            id="quantity_product_{{$cart->product->id}}">{{$cart->quantity}}</span>
        <button onclick="addQuantity('{{$cart->product->id}}')"
            class="px-4 py-1 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:bg-gray-300">+</button>

        <button onclick="remove(`{{$cart->product->id}}`)"
            class="px-4 py-1 ml-4 font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:bg-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>