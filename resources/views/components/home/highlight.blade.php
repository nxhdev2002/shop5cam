@foreach ($highlightCate as $key => $category)
<section class="{{$category->name}}">
    <div class="container mx-auto my-3 bg-white">
        <div class="flex flex-col items-center mx-3 my-3 basis-full md:basis-1/4">
            <h1 class="p-4 text-lg font-medium">{{$category->name}}</h1>
        </div>
        <div class="grid grid-cols-2 gap-6 p-4 md:grid-cols-4">

            @foreach ($productsOfHighLight[$key] as $product)
            <x-product-item :product="$product"></x-product-item>
            @endforeach
        </div>
    </div>
</section>
@endforeach