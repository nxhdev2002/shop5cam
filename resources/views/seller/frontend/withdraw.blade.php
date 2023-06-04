@include('layouts.header')
<div class="flex gap-8">
    @include('seller.frontend.sidebar')
    <main class="w-3/4 h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="justify-center">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Tài khoản của tôi
                </h2>
            </div>
            <div class="grid gap-8 md:grid-cols-2 xl:gird-rows-2">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <div
                        class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="">
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Số dư tài khoản
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            $15
                        </p>
                    </div>
                </div>

                <div>
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Rút tiền
                    </h2>

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4 ">
                            <label class="block text-sm font-medium text-gray-700">Số tiền muốn rút</label>
                            <input type="number" name="amount" class="form-input mt-1 block w-full rounded-lg shadow-sm"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Thông tin liên hệ</label>
                            <textarea name="contact_info" class="form-textarea mt-1 block w-full rounded-lg shadow-sm"
                                rows="3" required></textarea>
                        </div>
                        <div class="justify-center">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Rút
                                Tiền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>