@include('layouts.header')

<div class="container mx-auto my-3 bg-white rounded-lg">
    <div class="flex flex-col p-3">
        <h3 class="p-3 text-lg font-medium">Nạp tiền vào tài khoản</h3>
        <p class="p-3">Bạn có thể chọn 1 trong các phương thức thanh toán dưới đây</p>
        <div class="flex flex-col">
            @foreach ($gateways as $gateway)
            <a href="{{route('user.deposit.details', $gateway->id)}}" class="flex border rounded-lg">
                <div class="p-3 thumbnail">
                    <img src="{{ ($gateway->image) }}" class="w-16 h-16">
                </div>
                <div class="flex flex-col justify-center ml-3">
                    <h3>{{$gateway->name}}</h3>
                    <p>{{$gateway->description}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')