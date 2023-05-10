@include('layouts.header')

<div class="flex flex-col items-center justify-center h-screen">
    <div class="p-10 bg-white rounded-lg shadow-lg">
        <h2 class="mb-6 text-xl font-bold">Forgot Password?</h2>
        <p class="mb-6 text-gray-700">Please enter your email address below to reset your password.</p>
        <form method="post">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="email">
                    Email
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="email" type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                    type="submit">
                    Reset Password
                </button>
            </div>
        </form>
        <p class="mt-6 text-gray-700">Remembered your password? <a href="login"
                class="font-bold text-blue-500 hover:text-blue-700">Sign In</a></p>
    </div>
</div>

@include('layouts.footer')