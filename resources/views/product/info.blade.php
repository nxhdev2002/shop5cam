@include('layouts.header')
<!-- component -->
<section class="overflow-hidden text-gray-700 bg-white body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap mx-auto lg:w-4/5">
            <img alt="" class="object-cover object-center w-full border border-gray-200 rounded lg:w-1/2"
                src="{{$product->picture_url}}">
            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                <a href="{{route('categories.showByName', ['id' => $category->id, 'name' => \App\Helpers\Utils::create_slug($category->name)])}}"
                    class="text-sm tracking-widest text-gray-500 title-font">{{$product->category->name}}</a>
                <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{ $product->name }}</h1>
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
                        <span class="ml-3 text-gray-600">{{$product->views}} lượt xem</span>
                    </span>
                    <span class="flex py-2 pl-3 ml-3 border-l-2 border-gray-200">
                        <a class="text-gray-500" id="fb-share-button">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-2 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-2 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
                <p class="leading-relaxed">{{$product->description}}.</p>
                <div class="flex flex-col pb-5 mt-6 mb-5 border-b-2 border-gray-200">
                    <p>Số lượng: {{$product->amount}}</p>
                    <p>Trạng thái:
                        @if ($product->status == 0)
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            Ngừng bán
                        </span>
                        @else
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            Mở bán
                        </span>
                        @endif
                    </p>
                </div>
                <div class="flex items-center">
                    <span class="text-2xl font-medium text-gray-900 title-font">{{ number_format($product->price) }}
                        VNĐ</span>
                    <div class="flex items-center ml-auto">
                        <button type="button" onclick="minus()" class="w-8 border-l">-</button>
                        <input type="text" id="quantity" name="quantity" class="text-center w-11" value="1">
                        <button type="button" onclick="plus()" id="minus" class="w-8 border-r">+</button>
                    </div>

                    <button onclick="addToCart()"
                        class="flex px-6 py-2 ml-auto text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-600"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                        </svg>
                    </button>
                    <button
                        class="inline-flex items-center justify-center w-10 h-10 p-0 ml-4 text-gray-500 bg-gray-200 border-0 rounded-full">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
    $(document).ready(function () {
        $('#fb-share-button').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURI(window.location))
    });
</script>
<script>
    function plus() {
        let value = parseInt($('#quantity').val());
        $('#quantity').val(value + 1);
    }
    function minus() {
        let value = parseInt($('#quantity').val());
        $('#quantity').val(value - 1);
    }
    function addToCart() {
        let quantity = $('#quantity').val()
        let product_id = `{{$product->id}}`
        $.post("{{route('user.cart.add')}}", {
            'product_id': product_id,
            'quantity': quantity
        }).done(function (data) {
            if (!data.success) {
                Swal.fire(
                    'Lỗi',
                    data.message,
                    'error'
                )
            } else {
                Swal.fire(
                    'Thành công',
                    data.message,
                    'success'
                )
                loadCart()
            }
            // if (!data.append) {
            // $('#total').text(parseInt($('#total').text()) + 1)

            // }
        }).fail(function (err) {
            Swal.fire(
                'Lỗi',
                err.responseJSON.message,
                'error'
            )
        })
    }
</script>
@endpush
@include('layouts.footer')