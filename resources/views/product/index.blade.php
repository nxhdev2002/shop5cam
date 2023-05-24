@include('layouts.header')
<div class="container px-4 py-8 mx-auto bg-white">
    <span class="inline-block font-bold text-red-500 animate-blink">Danh sách sản phẩm</span>
    <div class="flex flex-col">
        <div>
            <div class="w-full p-5 bg-white rounded-lg">
                <div class="relative">
                    <div class="absolute flex items-center h-full ml-2">
                        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z">
                            </path>
                        </svg>
                    </div>

                    <input type="text" placeholder="Search by listing, location, bedroom number..."
                        class="w-full px-8 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                </div>

                <div class="flex items-center justify-between mt-4">
                    <p class="font-medium">
                        Filters
                    </p>

                    <div class="flex gap-3">
                        <button type="button"
                            class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Reset</button>

                        <button
                            class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                            </svg>
                            Lọc </button>
                    </div>
                </div>

                <div>
                    <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-3 xl:grid-cols-4">
                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">All Type</option>
                            <option value="for-rent">For Rent</option>
                            <option value="for-sale">For Sale</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Furnish Type</option>
                            <option value="fully-furnished">Fully Furnished</option>
                            <option value="partially-furnished">Partially Furnished</option>
                            <option value="not-furnished">Not Furnished</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Any Price</option>
                            <option value="1000">RM 1000</option>
                            <option value="2000">RM 2000</option>
                            <option value="3000">RM 3000</option>
                            <option value="4000">RM 4000</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Floor Area</option>
                            <option value="200">200 sq.ft</option>
                            <option value="400">400 sq.ft</option>
                            <option value="600">600 sq.ft</option>
                            <option value="800 sq.ft">800</option>
                            <option value="1000 sq.ft">1000</option>
                            <option value="1200 sq.ft">1200</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Bedrooms</option>
                            <option value="1">1 bedroom</option>
                            <option value="2">2 bedrooms</option>
                            <option value="3">3 bedrooms</option>
                            <option value="4">4 bedrooms</option>
                            <option value="5">5 bedrooms</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Bathrooms</option>
                            <option value="1">1 bathroom</option>
                            <option value="2">2 bathrooms</option>
                            <option value="3">3 bathrooms</option>
                            <option value="4">4 bathrooms</option>
                            <option value="5">5 bathrooms</option>
                        </select>

                        <select
                            class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="">Bathrooms</option>
                            <option value="1">1 space</option>
                            <option value="2">2 space</option>
                            <option value="3">3 space</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach ($products as $product)
            <x-item-cart-shadow :product="$product"></x-item-cart>
                @endforeach
        </div>
    </div>
    <p class="mt-3 text-xs">{{ $products->links()}}</p>
</div>
@include('layouts.footer')