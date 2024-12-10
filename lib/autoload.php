<?php 

const ALIASES = [

    'Components' => 'lib',
    'App' =>  'src'
];

spl_autoload_register(function(string $class): void {
    $namespaceParts = explode('\\', $class);

    if (in_array($namespaceParts[0], array_keys(ALIASES))) {
        $namespaceParts[0] = ALIASES[$namespaceParts[0]];
    }else{
        throw new Exception('Namespace " '.$namespaceParts[0].' " invalide. Un namespace doit commencer par : "Components" ou "App"');
    }

    $filepath = dirname(__DIR__).'/'.implode('/',$namespaceParts).'.php';
    if(!file_exists($filepath)){
        throw new Exception('Fichier "'.$filepath.'" introuvablepour la classe " '.$class.' ". Verifier le chemin, le nom de la classe ou le namespace ');
    } 
    require_once $filepath;
    
});

?>