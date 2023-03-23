<?php
$menu = [
    'home' => [
        'name' => 'Domov',
        'path' => 'index.php',
    ],
    'portfolio' => [
        'name' => 'Portfólio',
        'path' => 'portfolio.php',
    ],
    'qna' => [
        'name' => 'Q&A',
        'path' => 'qna.php',
    ],
    'kontakt' => [
        'name' => 'Kontakt',
        'path' => 'kontakt.php',
    ]
];

$json = json_encode($menu);
file_put_contents("source/headerMenu.json", $json);

$file = fopen("source/headerMenuCSV.csv", 'w');
foreach ($menu as $key){
    fputcsv($file,$key);
}

?>