<?php
//Varibles
$name = "Cesar";
$isDev = true;
$age = 78;
$isOld = $age > 40;
//Para forzar los tipos (no es lo habitual) 

$high = (bool) 124;

// If
// if ($isOld) {
//   echo "<h2>Eres viejo, lo siento</h2>";
// } else if ($isDev) {
//   echo "<h2>No eres viejo, pero eres programador</h2>";
// } else {
//   echo "<h2>Eres joven, felicidades</h2>";
// }

//Ternarias 
//$outputAge = $isOld
//  ? "Eres viejo, lo siento" //Si isOld es true 
//  : "Eres joven, felicidades"; //Si es False

//Metodo para ver el tipo de dato de una variable var_dump
// Operador para concatenar cadenas de texto "."
var_dump($name . " " . $isDev . " " . $age);
var_dump($name);
var_dump($age);
var_dump($isDev);

// Para saber si es el tipo que queremos y nos devuelbe un bool
echo is_bool($isDev);
echo is_int($age);
echo is_string($name);

$output = "Hola $name, tu edad es $age, y eres programador ";
$output .= "y estudia en la santa maria"; // para concatenar tambien un string con otro 

//Constantes
// Para globales, mejor crear un archivo con las constantes globales, no dejarlas en el codigo
define('Logo_URL', 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Universidad_Santa_Mar%C3%ADa_logo.gif');

//Del codigo en especifico
const UNV_NAME = "Santa Maria";

//Match mejor que switch 

$outputAge = match (true) { // Para evaluar el caso que sea true y mostrarlo 
  $age < 2    => "Eres un bebe, $name",
  $age < 10   => "Eres un niño, $name",
  $age < 18   => "Eres un adolecente, $name",
  $age === 18 => "Eres mayor de edad, $name",
  $age < 40   => "Eres un adulto joven, $name",
  $age < 60   => "Eres un adulto viejo, $name",
  default     => "Hueles mas a madera que a fruta, $name"
};

//Arreglos
$bestLanguages = ["PHP", "Java", "Python"];
$bestLanguages[] = "TypeScript"; //Para agregar posicion especifica
$bestLanguages[] = "javaScript"; //Para agregar posicion al final 

//Array con clave y valor 
$person = [
  "name" => "Cesar",
  "age" => 24,
  "isDev" => true,
  "languages" => ["PHP", "JavaScript", "Python"],
];

$person["languages"][] = "C++"  // Se buscaria por su clave
?>

<ul>// Para hacer una lista

  <?php foreach ($bestLanguages as $key => $languages) : ?>
    <li><?= $key + 1 . " " . $languages ?></li>
  <?php endforeach ?>

</ul>


// Renderizar (Siempre tenerlo lo mas lejo posible de la logica!!!)
<h2><?= $outputAge ?></h2>

<img src="<?= Logo_URL ?>" alt="USM Logo" width="200">
<h1>
  <?= $name . " " . $high // = para hace un echo 
    . " Con una edad de "  // Para hacer un salto de linea hay que hacer un <br />
    . $age; // Todo esto es una sola linea
  ?>
  <?= "<br />" . $output;
  ?>
</h1>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>