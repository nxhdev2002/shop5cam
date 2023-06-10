<section class="offer">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col xl:flex-row">
            <div class="flex flex-col mx-3 my-3 basis-full md:basis-1/6">
                <h1 class="font-medium">Ads</h1>
                <p class="font-light text-gray-400">Mặt hàng nổi bật</p>
            </div>

            <div class="flex flex-col md:flex-row basis-full md:basis-5/6">
                @foreach ($ads_products as $product)
                <div class="relative">
                    <span
                        class="absolute top-2 right-1.5 bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Được
                        tài trợ</span>
                    <a
                        href="{{route('products.showByName', ['id' => $product->id, 'name' => \App\Helpers\Utils::create_slug($product->name)])}}">
                        <div class="flex flex-col items-center py-3 px-9 sm:max-xl:border-b-2 md:border-l-2">
                            <div class="px-3 py-2">
                                <img src="{{$product->picture_url}}" style="width: 200px; height: 190px;">
                            </div>
                            <p>{{$product->name}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>


    </div>
    </div>
</section>