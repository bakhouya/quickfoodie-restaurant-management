<?php

return [
    'required' => 'Ce champ est obligatoire.',
    'min' => [
        'string' => 'Ce champ doit contenir au moins :min caractères.',
        'numeric' => 'Le nombre doit être au moins :min.',
    ],
    'max' => [
        'string' => 'Ce champ ne peut pas dépasser :max caractères.',
        'numeric' => 'Le nombre doit être égal ou inférieur à :max.',
    ],
    'email' => 'Ce champ doit être une adresse e-mail valide.',
    'unique' => 'Cette valeur est déjà enregistrée.',
    'confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    'password' => [
        'min' => 'Le mot de passe doit contenir au moins :min caractères.',
    ],
    'numeric' => 'Ce champ doit être un nombre.',
    'string' => 'Ce champ doit être une chaîne de texte.',
    'date' => 'Ce champ doit être une date valide.',
    'exists' => 'La valeur sélectionnée n\'existe pas.',
    'accepted' => 'Ce champ doit être accepté.',
    'boolean' => 'Ce champ doit être vrai ou faux.',
    'array' => 'Ce champ doit être un tableau.',
    'date_format' => 'Ce champ doit être au format :format.',
    'file' => 'Ce champ doit être un fichier.',
    'image' => 'Ce champ doit être une image.',
    'in' => 'La valeur sélectionnée est incorrecte.',
    'mimes' => 'Ce champ doit être de type :values.',
    'timezone' => 'Ce champ doit être un fuseau horaire valide.',
    'url' => 'Ce champ doit être une URL valide.',
    'size' => [
        'string' => 'Ce champ doit contenir :size caractères.',
        'numeric' => 'Ce champ doit être égal à :size.',
    ],

    'custom' => [
        'name' => [
            'required' => 'Le nom du restaurant est requis.',
            'string' => 'Le nom du restaurant doit être une chaîne de texte.',
            'max' => 'Le nom du restaurant ne peut pas dépasser :max caractères.',
        ],
        'email' => [
            'required' => 'L\'e-mail est requis.',
            'email' => 'L\'e-mail est invalide.',
        ],
        'password' => [
            'required' => 'Le mot de passe est requis.',
            'min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ],
    ],
    
    'attributes' => [
        'name' => 'nom',
        'email' => 'e-mail',
        'password' => 'mot de passe',
        'phone' => 'numéro de téléphone',
        'menu' => 'menu',
        'category' => 'catégorie',
        'reservation_time' => 'heure de réservation',
        'people_count' => 'nombre de personnes',
        'staff_name' => 'nom du personnel',
        'staff_role' => 'rôle du personnel',
    ],
];
