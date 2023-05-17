@include('layouts.header')
<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col items-center p-3">
        <h3>Nạp tiền qua phương thức: <b>{{$gateway->name}}</b></h3>
        <p>Bạn đã yêu cầu nạp: <b>{{$amount}} VNĐ</b></p>
        <p>Phí giao dịch: <b>{{ number_format($gatewayCurrency->fixed_fee) }} VNĐ </b>+<b> {{
                number_format($gatewayCurrency->percent_fee) }}% </b></p>
        <p>Thực nhận: <b>{{$total}} VNĐ</b></p>
        <form action="{{route('user.deposit.confirm')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$amount}}" name="amount">
            <input type="hidden" value="{{$gateway->id}}" name="gateway">
            <button disabled id="submitButt" type="submit"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span
                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Xác nhận
                </span>
            </button>
        </form>
    </div>
</div>


@push("scripts")
<script>
    $(document).ready(function () {
        $("#submitButt").removeAttr("disabled")
    });
</script>
@endpush

@include('layouts.footer')