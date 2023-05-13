<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute cần phải được chấp nhận.',
    'accepted_if' => 'The :attribute sẽ được chấp nhận khi :other đạt :value.',
    'active_url' => 'The :attribute không phải là 1 đường dẫn hợp lệ.',
    'after' => 'The :attribute phải là 1 ngày phía sau :date.',
    'after_or_equal' => 'The :attribute phải là 1 ngày sau hoặc trùng với :date.',
    'alpha' => 'The :attribute chỉ được chứa chữ cái',
    'alpha_dash' => 'The :attribute chỉ được chứa chữ cái, số, gạch ngang và gạch dưới.',
    'alpha_num' => 'The :attribute chỉ được chứa chữ cái và số.',
    'array' => 'The :attribute phải là mảng.',
    'before' => 'The :attribute phải là 1 ngày phía trước :date.',
    'before_or_equal' => 'The :attribute phải là 1 ngày trước hoặc trùng với :date.',
    'between' => [
        'numeric' => 'The :attribute phải có giá trị trong khoảng :min và :max.',
        'file' => 'The :attribute phải có dung lượng trong khoảng :min và :max kilobytes.',
        'string' => 'The :attribute chỉ được phép có số ký tự trong khoảng :min và :max .',
        'array' => 'The :attribute chỉ được phép chứa số lượng phần tử trong khoảng :min và :max.',
    ],
    'boolean' => 'The :attribute chỉ được phép đúng đúng hoặc sai.',
    'confirmed' => 'The :attribute không trùng khớp.',
    'current_password' => 'Mật khẩu không chính xác.',
    'date' => 'The :attribute không đúng định dạng ngày tháng.',
    'date_equals' => 'The :attribute phải là một ngày bằng :date.',
    'date_format' => 'The :attribute phải giống định dạng với :format.',
    'declined' => 'The :attribute phải đạt một trong các giá trị no off 0 false.',
    'declined_if' => 'The :attribute phải đạt một trong các giá trị no off 0 false khi :other đạt giá trị :value.',
    'different' => 'The :attribute và :other phải khác nhau.',
    'digits' => 'Dãy số :attribute phải có độ dài bằng :digits.',
    'digits_between' => 'Dãy số :attribute phải có giá trị trong khoảng :min và :max .',
    'dimensions' => 'Ảnh :attribute có kích thước không hợp lệ.',
    'distinct' => 'Mảng :attribute không được phép có giá trị trùng nhau.',
    'email' => 'The :attribute phải là email.',
    'ends_with' => 'The :attribute phải kết thúc là một trong các giá trị sau: :values.',
    'enum' => 'Selected :attribute không hợp lệ.',
    'exists' => 'Selected :attribute không tồn tại.',
    'file' => 'The :attribute phải là file.',
    'filled' => 'Dữ liệu nhập :attribute không được để trống.',
    'gt' => [
        'numeric' => 'The :attribute phải lớn hơn :value.',
        'file' => 'The :attribute phải bé hơn :value kilobytes.',
        'string' => 'The :attribute phải lớn hơn :value ký tự.',
        'array' => 'The :attribute phải có nhiều hơn :value giá trị.',
    ],
    'gte' => [
        'numeric' => 'The :attribute phải lớn hơn hoặc bằng :value.',
        'file' => 'The :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => 'The :attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => 'The :attribute phải có :value giá trị hoặc nhiều hơn.',
    ],
    'image' => 'The :attribute phải là ảnh.',
    'in' => 'Select :attribute không hợp lệ.',
    'in_array' => 'Dữ liệu nhập :attribute phải tồn tại trong các giá trị sau :other.',
    'integer' => 'The :attribute phải là số nguyên.',
    'ip' => 'The :attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => 'The :attribute phải là một địa chỉ IP4 hợp lệ.',
    'ipv6' => 'The :attribute phải là một địa chỉ IP6 hợp lệ.',
    'json' => 'The :attribute phải là một Json hợp lệ.',
    'lt' => [
        'numeric' => 'The :attribute phải nhỏ hơn :value.',
        'file' => 'The :attribute phải nhỏ hơn :value kilobytes.',
        'string' => 'The :attribute phải nhỏ hơn :value ký tự.',
        'array' => 'Số lượng :attribute phải ít hơn :value giá trị.',
    ],
    'lte' => [
        'numeric' => 'The :attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => 'The :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => 'The :attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => 'Số lượng :attribute mphải nhỏ hơn hoặc bằng :value giá trị.',
    ],
    'mac_address' => 'The :attribute phải là một địa chỉ MAC hợp lệ.',
    'max' => [
        'numeric' => 'The :attribute phải bé hơn :max.',
        'file' => 'The :attribute phải bé hơn :max kilobytes.',
        'string' => 'The :attribute phải bé hơn :max ký tự.',
        'array' => 'Số lượng :attribute phải bé hơn :max giá trị.',
    ],
    'mimes' => 'File nhập vào :attribute phải có dạng: :values.',
    'mimetypes' => 'File nhập vào :attribute phải có dạng: :values.',
    'min' => [
        'numeric' => 'The :attribute phải lớn hơn :min.',
        'file' => 'The :attribute phải lớn hơn :min kilobytes.',
        'string' => 'The :attribute phải lớn hơn :min ký tự.',
        'array' => 'Số lượng nhập vào :attribute phải lớn hơn :min giá trị.',
    ],
    'multiple_of' => 'Dữ liệu vừa nhập :attribute phải là bội số của :value.',
    'not_in' => 'The selected :attribute không hợp lệ.',
    'not_regex' => 'The :attribute không khớp với biểu thức chính quy.',
    'numeric' => 'The :attribute phải là số.',
    'password' => 'Mật khẩu không chính xác.',
    'present' => 'The :attribute phải xuất hiện trong input.',
    'prohibited' => 'The :attribute phải bị thiếu hoặc bị trống.',
    'prohibited_if' => 'The :attribute phải bị thiếu hoặc bị trống khi :other bằng :value.',
    'prohibited_unless' => 'The :attribute phải bị thiếu hoặc bị trống và :other không bằng :values.',
    'prohibits' => 'Các trường dữ liệu :attribute phải thiếu hoặc trống :other.',
    'regex' => 'The :attribute có biểu mẫu chính quy không phù hợp.',
    'required' => 'Dữ liệu ở :attribute bắt buộc phải nhập.',
    'required_array_keys' => 'The :attribute phải là một mảng và có các khóa: :values.',
    'required_if' => 'The :attribute phải được nhập khi :other bằng :value.',
    'required_unless' => 'The :attribute phải được nhập và :other không được bằng :values.',
    'required_with' => 'The :attribute phải được nhập và phải chứa một trong:values.',
    'required_with_all' => 'The :attribute phải được nhập và phải chứa tất cả:values.',
    'required_without' => 'The :attribute phải được nhập và không chứa một trong các giá trị: :values.',
    'required_without_all' => 'The :attribute phải được nhập và không chứa tất cả :values.',
    'same' => 'Hai trường dữ liệu :attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute phải bắt đầu bằng: :values.',
    'string' => 'The :attribute phải là giá trị string.',
    'timezone' => 'The :attribute phải có giá trị timezone hợp lệ.',
    'unique' => 'The :attribute phải là duy nhất.',
    'uploaded' => 'The :attribute upload thất bại.',
    'url' => 'The :attribute phải là dang URL.',
    'uuid' => 'The :attribute phải mang giá trị RFC.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
