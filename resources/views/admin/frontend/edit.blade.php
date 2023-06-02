<style>
    .boderx {
        border: 2px solid black;
    }
</style>

@include('layouts.header')
<div class="max-w-3xl m-auto overflow-x-auto content-between">
    <h2 class="max-w-3xl my-6 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
        Cập nhật thông tin người dùng!
    </h2>
    <form method="POST" action="/admin/user/update/{{$user->id}}">
        @csrf
        @method('PUT')
        <div class="grid grid-rows-6 mt-5 mb-5 ">
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="name">Tên hiển thị: </label>
                <input class="boderx" type="text" name="name" value="{{$user->name}}" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="email">Email:</label>
                <input class="boderx" type="email" name="email" value="{{$user->email}}" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="phone">Số điện thoại:</label>
                <input class="boderx" type="phone" name="phone" value="{{$user->phone}}" required>
            </div>
            <div class="grid grid-cols-2 mt-5 mb-5 ">
                <label for="payment">Số tài khoản:</label>
                <input class="boderx" type="payment" name="payment" value="{{$user->payment}}" required>
            </div>
            <div class="grid">
                <label for="rights" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rights</label>
                <select id="rights" name="rights"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="{{$user->rights}}">1</option>
                    <option value="3">3</option>
                    <option value="4">5</option>
                    <option value="9">9</option>
                </select>
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
    <img src="" alt="">
</div>
@include('layouts.footer')