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

    'accepted' => 'El :attribute debe ser válido.',
    'accepted_if' => 'El :attribute debe ser válido cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser ser una fecha después de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha después o igual de :date.',
    'alpha' => 'El :attribute solamente debe contener letras.',
    'alpha_dash' => 'El :attribute must solamente debe tener letras, números, puntos y guiones bajos.',
    'alpha_num' => 'El :attribute solamente debe contener letras y números.',
    'array' => 'El :attribute debe ser una lista de elementos.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha antes o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max carácteres.',
        'array' => 'El :attribute debe estar entre :min y :max elementos.',
    ],
    'boolean' => 'El :attribute campo debe ser verdadero o falso.',
    'confirmed' => 'El :attribute de confirmación no coincide.',
    'current_password' => 'La contraseña es incorrect.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato de fecha :format.',
    'declined' => 'El :attribute debe ser rechazado.',
    'declined_if' => 'El :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El :attribute y :other debe ser diferente.',
    'digits' => 'El :attribute debe ser :digits dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max digits.',
    'dimensions' => 'El :attribute tiene dimenosiones inválidas de imágenes.',
    'distinct' => 'El :attribute campo tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección válida.',
    'ends_with' => 'El :attribute debe terminar con los siguientes: :values.',
    'exists' => 'El atributo :attribute seleccionado es inválido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser más grande que :value.',
        'file' => 'El :attribute debe ser más grande que :value kilobytes.',
        'string' => 'El :attribute debe ser más grande que :value carácteres.',
        'array' => 'El :attribute debe ser más grande que :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser más grande o igual a :value.',
        'file' => 'El :attribute debe ser más grande o igual a :value kilobytes.',
        'string' => 'El :attribute debe ser más grande o igual a :value carácteres.',
        'array' => 'El :attribute debe tener :value elementos o más.',
    ],
    'image' => 'El :attribute debe ser una imágen.',
    'in' => 'El selected :attribute no es válido.',
    'in_array' => 'El :attribute campo no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute deber ser un documento JSON válido.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value carácteres.',
        'array' => 'El :attribute debe ser menor que :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file' => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que :value carácteres.',
        'array' => 'El :attribute no debe tener más de :value elementos.',
    ],
    'max' => [
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'string' => 'El :attribute no debe ser mayor que :max carácteres.',
        'array' => 'El :attribute must not have more than :max elementos.',
    ],
    'mimes' => 'El :attribute debe ser un archivo del tipo :values.',
    'mimetypes' => 'El :attribute debe ser un archivo del tipo :values.',
    'min' => [
        'numeric' => 'El :attribute debe tener por lo menos :min.',
        'file' => 'El :attribute debe tener por lo menos :min kilobytes.',
        'string' => 'El :attribute debe tener por lo menos :min characters.',
        'array' => 'El :attribute debe tener por lo menos :min elementos.',
    ],
    'multiple_of' => 'El :attribute debe ser una opción múltiple de :value.',
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El :attribute formato no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe existir.',
    'regex' => 'El formato :attribute es inválido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio al menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values exista.',
    'required_with_all' => 'El campo :attribute field es obligatorio cuando :values existan.',
    'required_without' => 'El campo :attribute es obligatio cuando :values no existan.',
    'required_without_all' => 'El  campo:attribute es obligatorio cuando ninguno de los valores: :values existan.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido al menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohibe :other de existir.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser :size.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'string' => 'El :attribute debe ser :size carácteres.',
        'array' => 'El :attribute debe tener :size elementos.',
    ],
    'starts_with' => 'El :attribute debe iniciar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser texto.',
    'timezone' => 'El :attribute debe ser una zona horaria válida.',
    'unique' => 'El :attribute ha sido tomado.',
    'uploaded' => 'El :attribute falló al subirse al servidor.',
    'url' => 'El :attribute debe ser una URL válida.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

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