<style>
    .boderx {
        border: 2px solid black;
    }
</style>

@include('layouts.header')
<div class="max-w-3xl m-auto overflow-x-auto content-between">
    <h2 class="max-w-3xl my-6 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
        Thay đổi thông tin cá nhân
    </h2>
    <form method="POST" action="/user/setting/update">
        @csrf
        @method('PUT')
        <div class="grid grid-rows-5 mt-5 mb-5 ">
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="name">Tên hiển thị: </label>
                <input class="boderx" type="text" name="name" value="" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="email">Email:</label>
                <input class="boderx" type="email" name="email" value="" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="phone">Số điện thoại:</label>
                <input class="boderx" type="phone" name="phone" value="" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="payment">Số tài khoản:</label>
                <input class="boderx" type="payment" name="payment" value="" required>
            </div>


            <!-- Các trường thông tin khác -->
            <div class="grid grid-cols-5">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <button class="m-auto w-28 h-12 bg-red-500 items-end" type="submit">Save</button>
            </div>
        </div>
    </form>
    <!-- <img src="" alt=""> -->
</div>
@include('layouts.footer')