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
            @foreach ($carts as $cart)
            <x-cart-item :cart="$cart"></x-cart-item>
            @endforeach
        </div>
        @endif
        <div class="flex flex-col py-10 basis-1/3">
            <h3 class="self-center p-3 text-xl font-semibold">Thanh toán</h3>
            <div class="flex justify-between p-4">
                <div class="font-semibold" onclick="applyGiftcode()">
                    Bạn có Giftcode?
                    <div class="hidden justify-between" id="giftCodeContainer">
                        <form action="{{route('user.applyGiftCode')}}" method="POST">
                            @csrf
                            <input type="text" id="small-input" name="giftcode"
                                class="block w-full p-2 mr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="submit"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Apply</button>
                        </form>
                    </div>
                </div>
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
    $(document).ready(function () {
        $.get("{{route('user.cart.load')}}")
            .done((data) => {
                data.data.forEach(item => {
                    $("#cart-items").append("")
                });
            })
    });
</script>
<script>
    async function remove(id) {
        deleteCart(id)
        $('#product-' + id).removeClass('opacity-100').addClass('opacity-0')
        await new Promise(r => setTimeout(r, 300));
        $('#product-' + id).addClass('hidden')
        window.top.location = window.top.location
    }

    function addQuantity(product_id) {
        let quantityDom = $("#quantity_product_" + product_id)
        let quantity = parseInt(quantityDom.text())
        quantityDom.text(quantity + 1)
        addToCart(product_id, 1)
        window.top.location = window.top.location
    }

    function minusQuantity(product_id) {
        let quantityDom = $("#quantity_product_" + product_id)
        let quantity = parseInt(quantityDom.text())
        if (quantity - 1 < 1) return
        quantityDom.text(quantity - 1)
        addToCart(product_id, -1)
        window.top.location = window.top.location
    }

    function addToCart(product_id, quantity) {
        $.post("{{route('user.cart.add')}}", {
            'product_id': product_id,
            'quantity': quantity
        }).done(function (data) {
            toastr.success(data.message)
        })
    }

    function applyGiftcode(code) {
        $('#giftCodeContainer').removeClass("hidden")
        $('#giftCodeContainer').addClass("flex")
    }
</script>
@endpush
@include('layouts.footer')