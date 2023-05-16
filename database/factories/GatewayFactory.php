<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Chuyển khoản ngân hàng',
            'image' => 'images/bank.png',
            'status' => 1,
            'description' => 'Nạp tiền bằng phương thức chuyển khoản ngân hàng.',
            'content' => '<h1>Bạn vui lòng chuyển tiền theo hướng dẫn sau:</h1><p>STK: 0961000035861</p><p>Ngân hàng: Vietcombank</p><p>Tên TK: Nguyen Xuan Hoang</p><img src="https://img.vietqr.io/image/VCB-0961000035861-compact.png">'
        ];
    }
}
