<section class="offer">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col xl:flex-row">
            <div class="flex flex-col mx-3 my-3 basis-full md:basis-1/6">
                <h1 class="font-medium">Ads</h1>
                <p class="font-light text-gray-400">Mặt hàng nổi bật</p>
            </div>

            <div class="flex flex-col md:flex-row basis-full md:basis-5/6">
                @foreach ($ads_products as $product)
                <a
                    href="{{route('products.showByName', ['id' => $product->id, 'name' => \App\Helpers\Utils::create_slug($product->name)])}}">
                    <div class="flex flex-col items-center py-3 px-9 sm:max-xl:border-b-2 md:border-l-2">
                        <div class="px-3 py-2">
                            <img src="{{$product->picture_url}}" alt="">
                        </div>
                        <p>{{$product->name}}</p>
                    </div>
                </a>
                @endforeach
            </div>

        </div>


    </div>
    </div>
</section>