<section class="best-seller">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col items-center mx-3 my-3 basis-full md:basis-1/4">
            <h1 class="p-4 text-lg font-medium">Best Seller</h1>
            <p class="font-light text-gray-400">Hygiene equipments</p>
        </div>
        <div class="grid grid-cols-2 gap-6 p-4 md:grid-cols-4">
            @for($i = 0; $i < 8; $i++) <a href="#">
                <div class="p-4 border-b border-gray-300 rounded-md shadow-md">
                    <img src="https://cdn.shopify.com/s/files/1/0616/9480/4174/products/ragbo4535819dd2_q5_2-0_09147857-3836-4dbf-a6b4-777b1738b821.jpg?v=1652168845&width=600"
                        alt="Product 1" class="object-cover w-full h-full mb-4">
                    <h2 class="text-lg font-bold">Product {{$i}}</h2>
                    <p class="mb-2 text-gray-500">{{'Description'.$i}}</p>
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">1 VNĐ</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </div>
                </div>
                </a>
                @endfor
        </div>
    </div>
</section>