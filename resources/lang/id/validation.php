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

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid',
    'after' => ':attribute harus berupa tanggal sesudah :date.',
    'after_or_equal' => ':attribute harus berupa tanggal sesudah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandung huruf',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus berupa tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus diantara :min dan :max.',
        'file' => ':attribute harus diantara :min dan :max kilobytes.',
        'string' => ':attribute harus diantara :min dan :max karakter.',
        'array' => ':attribute harus diantara :min dan :max item.',
    ],
    'boolean' => 'Field :attribute harus bernilai true atau false.',
    'confirmed' => ':attribute konfirmasi tidak cocok',
    'date' => ':attribute bukan tanggal yang valid',
    'date_equals' => ':attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak sesuai dengan format :format.',
    'different' => ':attribute dan :other harus berbeda',
    'digits' => ':attribute harus :digits digit ',
    'digits_between' => ':attribute harus diantara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Field :attribute memiliki nilai duplikat',
    'email' => ':attribute harus berupa alamat email yang valid',
    'exists' => ':attribute yang dipilih tidak valid',
    'file' => ':attribute harus berupa file',
    'filled' => ':attribute harus memiliki nilai',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus lebih besar dari :value kilobytes.',
        'string' => ':attributeharus lebih besar dari :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file' => ':attribute lebih besar atau sama dengan :value kilobytes.',
        'string' => ':attribute lebih besar atau sama dengan :value characters.',
        'array' => ':attribute harus memiliki :value item atau lebih',
    ],
    'image' => ':attribute harus berupa gambar',
    'in' => ':attribute yang dipilih tidak valid',
    'in_array' => 'Field :attribute tidak ada di :other.',
    'integer' => 'The :attribute harus berupa bilangan bulat (integer)',
    'ip' => 'The :attribute harus berupa alamat IP yang valid',
    'ipv4' => 'The :attribute harus berupa alamat IPv4 (IPv4 address) yang valid',
    'ipv6' => 'The :attribute harus berupa alamat IPv6 (IPv6 address) yang valid',
    'json' => 'The :attribute harus berupa JSON string yang valid',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobytes.',
        'string' => ':attribute harus kurang dari :value karakter.',
        'array' => ':attribute harus kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
        'array' => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute mungkin tidak lebih besar dari :max.',
        'file' => ':attribute mungkin tidak lebih besar dari :max kilobytes.',
        'string' => ':attribute mungkin tidak lebih besar dari :max characters.',
        'array' => ':attribute mungkin tidak lebih dari :max items.',
    ],
    'mimes' => ':attribute harus berupa file dengan tipe : :values.',
    'mimetypes' => ':attribute harus berupa file dengan tipe : :values.',
    'min' => [
        'numeric' => ':attribute setidaknya harus :min.',
        'file' => ':attribute setidaknya harus :min kilobytes.',
        'string' => ':attribute setidaknya harus :min karakter.',
        'array' => ':attribute setidaknya harus :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid',
    'not_regex' => 'Format :attribute tidak valid',
    'numeric' => ':attribute harus berupa nomor',
    'present' => 'Field :attribute harus ada',
    'regex' => 'Format :attribute tidak valid',
    'required' => 'Field :attribute dibutuhkan',
    'required_if' => 'Field :attribute dibutuhkan ketika :other adalah :value.',
    'required_unless' => 'Field :attribute dibutuhkan kecuali :other adalah :values.',
    'required_with' => 'Field :attribute dibutuhkan ketika :values ada',
    'required_with_all' => 'Field :attribute dibutuhkan ketika :values ada',
    'required_without' => 'Field :attribute dibutuhkan ketika :values tidak ada',
    'required_without_all' => 'Field :attribute dibutuhkan ketika tidak ada :values yang ada',
    'same' => ':attribute dan :other harus cocok',
    'size' => [
        'numeric' => ':attribute harus :size.',
        'file' => ':attribute harus :size kilobytes.',
        'string' => ':attribute harus :size karakter.',
        'array' => ':attribute harus berisi :size item',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari item berikut : :values',
    'string' => ':attribute harus berupa string',
    'timezone' => ':attribute harus merupakan zona waktu yang valid.',
    'unique' => ':attribute sudah digunakan sebelumnya',
    'uploaded' => ':attribute gagal untuk mengunggah',
    'url' => 'Format :attribute tidak valid',
    'uuid' => ':attribute harus berupa UUID yang valid.',

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
