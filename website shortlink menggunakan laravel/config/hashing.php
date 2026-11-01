<?php

return [
    'default' => 'bcrypt', // Atur algoritma hashing default di sini
    'bcrypt' => [
        'rounds' => 10, // Jumlah rounds untuk bcrypt
    ],
    'argon' => [
        'memory' => 1024, // Memori dalam kilobytes
        'threads' => 2, // Jumlah thread
        'time' => 2, // Waktu eksekusi dalam detik
    ],
];
