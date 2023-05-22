<section class="best-seller">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col items-center mx-3 my-3 basis-full md:basis-1/4">
            <h1 class="p-4 text-lg font-medium">Best Seller</h1>
            <p class="font-light text-gray-400">Hygiene equipments</p>
        </div>
        <div class="grid grid-cols-2 gap-6 p-4 md:grid-cols-4">
            @foreach ($products as $product)
            <x-item-cart :product="$product"></x-item-cart>
            @endforeach
        </div>
    </div>
</section>



@push('scripts')
<script>
    function addToCart(product_id, quantity) {
        let id = `#status-${product_id}`
        $(id).removeClass('hidden')
        $.post("{{route('user.cart.add')}}", {
            'product_id': product_id,
            'quantity': quantity
        }).done(function (data) {
            toastr.success(data.message)
            $(id).addClass("hidden")
            loadCart()
            // if (!data.append) {
            // $('#total').text(parseInt($('#total').text()) + 1)

            // }
        })
    }
</script>
@endpush