<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Public branches
    |--------------------------------------------------------------------------
    |
    | Every published number is a WhatsApp contact. Keep the normalized number
    | beside its display value so future components can build safe links.
    |
    */
    'branches' => [
        [
            'name' => 'Mecánica FyB y Auxilio FyB',
            'short_name' => 'Mecánica y Auxilio',
            'address' => 'Lamadrid 833, Bell Ville, Córdoba',
            'contacts' => [
                ['display' => '3537598438', 'e164' => '+5493537598438'],
                ['display' => '3537592461', 'e164' => '+5493537592461'],
            ],
        ],
        [
            'name' => 'Servicentro FyB',
            'short_name' => 'Servicentro',
            'address' => 'Bv. Colón 1045, Bell Ville, Córdoba',
            'contacts' => [
                ['display' => '3537302399', 'e164' => '+5493537302399'],
                ['display' => '3537598693', 'e164' => '+5493537598693'],
            ],
        ],
    ],
];
