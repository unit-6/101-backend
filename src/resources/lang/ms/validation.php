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

    'accepted' => ':attribute mestilah dipersetujui.',
    'active_url' => ':attribute adalah URL yang tidak sah.',
    'after' => ':attribute mestilah tarikh selepas :date.',
    'after_or_equal' => ':attribute mestilah tarikh selepas atau pada :date.',
    'alpha' => ':attribute hanya boleh mengandungi huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandungi huruf, nombor, sengkang and garis bawah.',
    'alpha_num' => ':attribute hanya boleh mengandungi huruf dan nombor.',
    'array' => ':attribute mestilah sejenis array.',
    'before' => ':attribute mestilah tarikh sebelum :date.',
    'before_or_equal' => ':attribute mestilah tarikh sebelum atau pada :date.',
    'between' => [
        'numeric' => ':attribute mestilah diantara :min hingga :max.',
        'file' => ':attribute mestilah diantara :min hingga :max kilobytes.',
        'string' => ':attribute mestilah diantara :min hingga :max huruf.',
        'array' => ':attribute mestilah mengandungi diantara :min hingga :max item.',
    ],
    'boolean' => ':attribute mestilah ya atau tidak.',
    'confirmed' => ':attribute pengesahan tidak sepadan.',
    'date' => ':attribute bukan tarikh yang sah.',
    'date_equals' => ':attribute mestilah tarikh pada :date.',
    'date_format' => ':attribute tidak sepadan formatnya dengan :format.',
    'different' => ':attribute dan :other mestilah berbeza.',
    'digits' => ':attribute mestilah :digits digit.',
    'digits_between' => ':attribute mestilah diantara :min hingga :max digit.',
    'dimensions' => ':attribute mempunyai dimensi imej yang tidak sah.',
    'distinct' => ':attribute mempunyai nilai berulang.',
    'email' => ':attribute mestilah alamat emel yang sah.',
    'ends_with' => ':attribute mestilah diakhiri dengan salah satu daripada berikut: :values.',
    'exists' => ':attribute yang dipilih tidak sah.',
    'file' => ':attribute mestilah sejenis fail.',
    'filled' => 'Ruangan :attribute wajib diisi.',
    'gt' => [
        'numeric' => ':attribute mestilah lebih daripada :value.',
        'file' => ':attribute mestilah lebih daripada :value kilobytes.',
        'string' => ':attribute mestilah lebih daripada :value huruf.',
        'array' => ':attribute mestilah lebih daripada :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute mestilah lebih atau mengandungi :value.',
        'file' => ':attribute mestilah lebih atau mengandungi :value kilobytes.',
        'string' => ':attribute mestilah lebih atau mengandungi :value huruf.',
        'array' => ':attribute mestilah mengandungi :value item atau lebih.',
    ],
    'image' => ':attribute mestilah sejenis imej.',
    'in' => ':attribute yang dipilih tidak sah.',
    'in_array' => ':attribute tidak wujud di dalam :other.',
    'integer' => ':attribute mestilah sejenis nombor bulat.',
    'ip' => ':attribute mestilah alamat IP yang sah.',
    'ipv4' => ':attribute mestilah alamat IPv4 yang sah.',
    'ipv6' => ':attribute mestilah alamat IPv6 yang sah.',
    'json' => ':attribute mestilah JSON yang sah.',
    'lt' => [
        'numeric' => ':attribute mestilah mengandungi kurang daripada :value.',
        'file' => ':attribute mestilah mengandungi kurang daripada :value kilobytes.',
        'string' => ':attribute mestilah mengandungi kurang daripada :value huruf.',
        'array' => ':attribute mestilah mengandungi kurang daripada :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute mestilah kurang atau mengandungi :value.',
        'file' => ':attribute mestilah kurang atau mengandungi :value kilobytes.',
        'string' => ':attribute mestilah kurang atau mengandungi :value huruf.',
        'array' => ':attribute tidak boleh mengandungi melebihi :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh mengandungi melebihi :max.',
        'file' => ':attribute tidak boleh mengandungi melebihi :max kilobytes.',
        'string' => ':attribute tidak boleh mengandungi melebihi :max huruf.',
        'array' => ':attribute tidak boleh mengandungi melebihi :max item.',
    ],
    'mimes' => ':attribute mestilah fail jenis: :values.',
    'mimetypes' => ':attribute mestilah fail jenis: :values.',
    'min' => [
        'numeric' => ':attribute mestilah sekurang-kurangnya :min.',
        'file' => ':attribute mestilah sekurang-kurangnya :min kilobytes.',
        'string' => ':attribute mestilah sekurang-kurangnya :min huruf.',
        'array' => ':attribute mestilah mengandungi sekurang-kurangnya :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak sah.',
    'not_regex' => 'Format :attribute tidak sah.',
    'numeric' => ':attribute mestilah sejenis nombor.',
    'password' => 'Kata laluan salah.',
    'present' => ':attribute mestilah wujud.',
    'regex' => 'Format :attribute tidak sah.',
    'required' => ':attribute diperlukan.',
    'required_if' => ':attribute diperlukan apabila :other adalah :value.',
    'required_unless' => ':attribute diperlukan kecuali :other terkandung dalam :values.',
    'required_with' => ':attribute diperlukan apabila :values wujud.',
    'required_with_all' => ':attribute diperlukan apabila :values wujud.',
    'required_without' => ':attribute diperlukan apabila :values tidak wujud.',
    'required_without_all' => ':attribute diperlukan apabila tiada satu pun :values wujud.',
    'same' => ':attribute dan :other mesti sepadan.',
    'size' => [
        'numeric' => ':attribute mestilah :size.',
        'file' => ':attribute mestilah :size kilobytes.',
        'string' => ':attribute mestilah mengandungi :size huruf.',
        'array' => ':attribute mestilah mengandungi :size item.',
    ],
    'starts_with' => ':attribute mesti dimulakan dengan antara satu nilai berikut: :values.',
    'string' => ':attribute mestilah sejenis perkataan/huruf.',
    'timezone' => ':attribute mestilah zon masa yang sah.',
    'unique' => ':attribute telah wujud.',
    'uploaded' => ':attribute gagal dimuat naik.',
    'url' => 'Format :attribute tidak sah.',
    'uuid' => ':attribute mestilah UUID yang sah.',

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
