<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Líneas de Idioma de Validación
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma contienen los mensajes de error predeterminados
    | utilizados por la clase validadora. Algunas de estas reglas tienen múltiples
    | versiones, como las reglas de tamaño. Siéntete libre de ajustar cada uno
    | de estos mensajes aquí.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute solo debe contener letras.',
    'alpha_dash' => 'El :attribute solo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo debe contener letras y números.',
    'array' => 'El :attribute debe ser un arreglo.',
    'before' => 'El :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'string' => 'El :attribute debe tener entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'declined' => 'El :attribute debe ser rechazado.',
    'declined_if' => 'El :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe tener :digits dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max dígitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_start_with' => 'El :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionado no es válido.',
    'exists' => 'El :attribute seleccionado no es válido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El :attribute debe tener más de :value elementos.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'string' => 'El :attribute debe ser mayor que :value caracteres.',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener :value elementos o más.',
        'file' => 'El :attribute debe ser mayor o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser mayor o igual a :value.',
        'string' => 'El :attribute debe ser mayor o igual a :value caracteres.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'array' => 'El :attribute debe tener menos de :value elementos.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'numeric' => 'El :attribute debe ser menor que :value.',
        'string' => 'El :attribute debe ser menor que :value caracteres.',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más de :value elementos.',
        'file' => 'El :attribute debe ser menor o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser menor o igual a :value.',
        'string' => 'El :attribute debe ser menor o igual a :value caracteres.',
    ],
    'mac_address' => 'El :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El :attribute no debe tener más de :max elementos.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe ser mayor que :max caracteres.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elementos.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El :attribute debe ser al menos :min.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
    ],
    'multiple_of' => 'El :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El :attribute debe contener al menos un número.',
        'symbols' => 'El :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El :attribute proporcionado ha aparecido en una filtración de datos. Por favor, elige un :attribute diferente.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe la presencia de :other.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El :attribute debe contener :size elementos.',
        'file' => 'El :attribute debe tener :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe tener :size caracteres.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona horaria válida.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'uploaded' => 'El :attribute falló al subir.',
    'url' => 'El :attribute debe ser una URL válida.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Líneas de Idioma de Validación Personalizadas
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar mensajes de validación personalizados para atributos
    | utilizando la convención "atributo.regla" para nombrar las líneas. Esto
    | facilita la personalización de cualquier mensaje que necesite ser más
    | específico que el predeterminado.
    |
    */

    'custom' => [],

    /*
    |--------------------------------------------------------------------------
    | Líneas de Idioma de Validación de Atributos
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma son utilizadas para intercambiar
    | marcadores de posición de atributos con nombres legibles por humanos,
    | como "E-Mail Address" en lugar de "email". Esto simplemente
    | ayuda a hacer que nuestro mensaje sea más expresivo.
    |
    */

    'attributes' => [],

];
