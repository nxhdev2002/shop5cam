@include('layouts.header')

<div class="container p-3 mx-auto">
    <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
        <li
            class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span
                class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                Giỏ <span class="hidden sm:inline-flex sm:ml-2">hàng</span>
            </span>
        </li>
        <li
            class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span
                class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                <span class="mr-2">2</span>
                Thanh <span class="hidden sm:inline-flex sm:ml-2">toán</span>
            </span>
        </li>
        <li class="flex items-center">
            <span class="mr-2">3</span>
            Xác <span class="hidden sm:inline-flex sm:ml-2">nhận</span>
        </li>
    </ol>
</div>

<div class="container mx-auto my-3 bg-white">
    <div class="flex flex-col md:flex-row">
        @if (count($carts) == 0)
        <div class="flex flex-col items-center py-10 border-r border-gray-200 basis-2/3">
            <h3 class="p-3 text-xl font-semibold">Giỏ hàng trống!</h3>
            <p class="p-2">Thêm sản phẩm vào giỏ hàng rồi quay lại sau nhé !!</p>
            <img src="https://cdn.divineshop.vn/static/4e0db8ffb1e9cac7c7bc91d497753a2c.svg" alt="Giỏ hàng trống">
        </div>
        @else
        <div
            class="flex flex-col py-10 overflow-auto border-r border-gray-200 basis-2/3 max-h-96 md:h-auto md:max-h-max ">
            <h3 class="self-center p-3 text-xl font-semibold">Giỏ hàng</h3>
            @foreach($carts as $cart)
            <div class="flex items-center justify-between p-4 m-4 transition-opacity duration-300 border-b border-gray-300 opacity-100"
                id="product-{{$cart->product->id}}">
                <div class="flex items-center flex-grow-0 flex-shrink-0">
                    <img class="w-16 h-16 mr-4 rounded" src="{{$cart->product->picture_url}}"
                        alt="{{$cart->product->name}}">
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
            @endforeach
        </div>
        @endif
        <div class="flex flex-col py-10 basis-1/3">
            <h3 class="self-center p-3 text-xl font-semibold">Thanh toán</h3>
            <div class="flex justify-between p-4">
                <div class="font-semibold">Bạn có mã giảm giá?</div>
                <div class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex justify-between p-4">
                <div class="font-semibold">Bạn muốn tặng cho bạn bè?</div>
                <div class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
            </div>
            <div class="flex justify-between p-4">
                <div class="font-semibold">Thanh toán</div>
            </div>
            <div class="flex justify-between p-4">
                <div>Tổng giá trị sản phẩm</div>
                <p>{{ number_format($total) }} VNĐ</p>
            </div>
            <hr>
            <div class="flex justify-between px-4">
                <div>Giảm giá</div>
                <p class="text-sm font-semibold">0 VNĐ</p>
            </div>
            <div class="flex justify-between px-4">
                <div>Số dư hiện tại</div>
                <p class="text-sm font-semibold">{{ number_format( auth()->user()->balance ) }} VNĐ</p>
            </div>
            <div class="flex justify-between px-4">
                @if (auth()->user()->balance < $total) <div>Tổng tiền phải nạp thêm</div>
            <p class="text-sm font-semibold">{{ number_format($total - auth()->user()->balance) }} VNĐ</p>
            @else
            <div>Tổng</div>
            <p class="text-sm font-semibold">{{number_format($total)}} VNĐ</p>
            @endif
        </div>
        @if (count($carts) > 0)
        <form action="{{route('user.cart.checkout')}}" method="POST">
            @csrf
            <button
                class="flex mx-auto items-center justify-center p-3 m-4 rounded-lg {{ auth()->user()->balance < $total ? "
                cursor-not-allowed bg-red-200" : "bg-orange-400" }}" type="submit">
                <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
                <p class="ml-3">Thanh toán</p>
            </button>
        </form>

        @endif
        @if (auth()->user()->balance < $total) <p class="text-sm text-center">Bạn không có đủ tiền để thanh toán!.
            Vui lòng nạp
            thêm tiền vào tài khoản</p>
            @endif
    </div>
</div>
</div>


@push("scripts")
<script>
    async function remove(id) {
        deleteCart(id)
        $('#product-' + id).removeClass('opacity-100').addClass('opacity-0')
        await new Promise(r => setTimeout(r, 300));
        $('#product-' + id).addClass('hidden')
    }

    function addQuantity(product_id) {
        let quantityDom = $("#quantity_product_" + product_id)
        let quantity = parseInt(quantityDom.text())
        quantityDom.text(quantity + 1)
    }

    function minusQuantity(product_id) {
        let quantityDom = $("#quantity_product_" + product_id)
        let quantity = parseInt(quantityDom.text())
        if (quantity - 1 < 1) return
        quantityDom.text(quantity - 1)
    }

</script>
@endpush
@include('layouts.footer')