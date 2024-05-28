<?php

//Clase de Carro
class Cambio
{
  private int $cambioActual = 5;

  public function SubirCambio(string $manual): string
  {
    $manual = strtoupper($manual);
    if ($manual === "MANUAL") {

      if ($this->cambioActual == 6) {

        return "<br />El carro no puede subir mas cambios...";
      }
      $this->cambioActual += 1;
      return "<br />Se ha subido un cambio...";
    } //Mientras el carro sea manual

    return "<br />Transmision automatica, no se puede hacer cambios...";
  }

  public function BajarCambio(string $manual)
  {
    $manual = strtoupper($manual);

    if ($manual === "MANUAL") {

      if ($this->cambioActual == -1) {
        return "<br />El carro no puede bajar mas cambios...";
      }
      $this->cambioActual -= 1;
      return "<br />Se ha subido un cambio...";
    } //Mientras el carro sea manual
    return "<br />Transmision automatica, no se puede hacer cambios...";
  }

  public function GetCambioActual(): string
  {
    $outputCambio = match (true) {
      $this->cambioActual == 0 => "Neutro...",
      $this->cambioActual == 1 => "Primera...",
      $this->cambioActual == 2 => "Segunda...",
      $this->cambioActual == 3 => "Tercera...",
      $this->cambioActual == 4 => "Cuarta...",
      $this->cambioActual == 5 => "Quinta...",
      $this->cambioActual == 6 => "Sexta...",
      default => "Retroceso...", // -1 == Retrocediendo
    };
    return $outputCambio;
  }
}

class Carro extends Cambio
{
  //Propiedades
  public string $marca;
  public string $modelo;
  public string $color;

  private int $año;
  private string $placa;
  private float $kilometraje;
  private float $tanqueGas;
  private float $gasNvl;
  private string $motorTipo; // Gasolina, diesel 
  private float $consumo; // Km x L
  private string $transmision; // Auto, Manual
  private int $nroPuertas;
  private int $nroRuedas;
  private string $traccionTipo; // Delantera, Tracera, AWD
  private int $maxPasajeros;
  private int $maxCarga;
  private float $precio;
  private $palancaCambio;

  //Estados 
  private bool $encendido = false;
  private bool $avanzando = false;
  private bool $retrocediendo = false;

  /*  METODOS  */
  //Acciones

  public function Encender(): string
  {
    if ($this->encendido) {
      return "El carro ya esta encendido...";
    }
    $this->encendido = true;
    return "El carro se ha encendido...";
  }

  public function Apagar(): string
  {
    if (!$this->encendido) {
      return "El carro ya esta apagado...";
    }
    $this->encendido = false;
    return "El carro se ha apagado...";
  }

  public function Avanzar(): string
  {
    if (!$this->encendido || $this->retrocediendo) {
      return "<br />El carro no puede avanzar porque esta apagado...";
    }
    $this->avanzando = true;
    return "<br />El carro " . $this->marca . " " . $this->modelo . " esta avanzando...";
  }

  public function Retroceder(): string
  {
    if ($this->avanzando || !$this->encendido) {
      return "<br />El carro no puede retroceder mientras avanza...";
    }
    $this->retrocediendo = true;
    return "<br />El carro " . $this->marca . " " . $this->modelo . " esta retrocediendo...";
  }

  public function Frenar(): string
  {
    if (!$this->avanzando) {
      return "<br />El carro se ha franado aunque no este avanzando...";
    }
    return "<br />El carro se ha frenado completamente...";
  }

  public function Girar($direccion): string
  {
    if (!$this->avanzando) {
      return "<br />El carro no esta en movimiento asi que no puede girar...";
    }
    return "<br />El carro esta girando a la $direccion ";
  }

  //Constructor
  public function __construct(
    $marca,
    $modelo,
    $color,
    $año,
    $placa,
    $kilometraje,
    $tanqueGas,
    $gasNvl,
    $motorTipo,
    $consumo,
    $transmision,
    $nroPuertas,
    $nroRuedas,
    $traccionTipo,
    $maxPasajeros,
    $maxCarga,
    $precio
  ) {
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->color = $color;
    $this->kilometraje = $kilometraje;
    $this->año = $año;
    $this->placa = $placa;
    $this->kilometraje = $kilometraje;
    $this->tanqueGas = $tanqueGas;
    $this->gasNvl = $gasNvl;
    $this->motorTipo = $motorTipo;
    $this->consumo = $consumo;
    $this->transmision = $transmision;
    $this->nroPuertas = $nroPuertas;
    $this->nroRuedas = $nroRuedas;
    $this->traccionTipo = $traccionTipo;
    $this->maxPasajeros = $maxPasajeros;
    $this->maxCarga = $maxCarga;
    $this->precio = $precio;
    // $this->palancaCambio = new Cambio;
  } //TODO IMPLEMENTAR VALIDACION PARA LAS PROPIEDADES PRIVADAS

  //Setters
  public function SetBool($bool): string
  {
    if ($bool) {
      return "Si...";
    } else {
      return "No...";
    }
  }

  // Getters
  public function GetTransmision(): string
  {
    return $this->transmision;
  } //TODO --> IMPLEMENTAR PALANCA DE CAMBIO SEGUN EL TIPO DE TRANSMISION...


  public function GetEstado(): string
  {
    return $info =
      "<br />El carro esta encendido: " . $this->SetBool($this->encendido) .
      "<br />El carro esta avanzando: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta retrocediendo: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta la marcha: " . $this->GetCambioActual();
  }

  public function GetKm(): string
  {
    return "<br />Los kilometrajes son " . $this->kilometraje . " Km";
  }

  public function GetInfoCarro()
  {
    return $info = "
            <br />La marca es:  $this->marca,
            <br />El modelo es: $this->modelo,
            <br />El color es:  $this->color,
            <br />El año es: $this->año, 
            <br />La placa es: $this->placa,
            <br />El kilometraje es: $this->kilometraje Km,
            <br />La capacidad de gasolina es: $this->tanqueGas Km,
            <br />El nivel de la gasolina es: $this->gasNvl, 
            <br />El tipo de motor es: $this->motorTipo,
            <br />Su consumo es de: $this->consumo litros por Km, 
            <br />Tipo de transmision es: $this->transmision, 
            <br />Total de puertas: $this->nroPuertas, 
            <br />Total de ruedas: $this->nroRuedas, 
            <br />Tipo de traccion: $this->traccionTipo, 
            <br />Capacidad Max de Pasajeros: $this->maxPasajeros,
            <br />Capacidad Max de Carga: $this->maxCarga,
            <br />Precio de concesionario: $this->precio $";
  }
}

$corolla = new Carro(
  "Toyota",
  "Corolla",
  "Rojo",
  2015,
  "AZC452",
  0,
  5,
  15,
  "Gasolina",
  10,
  "Manual",
  5,
  4,
  "Trasera",
  5,
  200,
  12000
);

?>


<!--VISUALIZAR-->

<main>
  <title>OOP Carro </title>

  <h1>Caracteristicas del carro</h1>
  <?= $corolla->GetInfoCarro(); ?>

  <h1>Acciones que realiza el carro</h1>
  <?= $corolla->Avanzar() . $corolla->Girar("Derecha") . $corolla->SubirCambio("Manual"); ?>

  <h1>Estados del carro</h1>
  <?= $corolla->GetEstado(); ?>

  <footer>
    <h2>Recursos usados para realizar el proyecto...</h2>
    <br /><a href="https://www.youtube.com/watch?v=BcGAPkjt_IE" target="_blank">Curso de PHP</a>
    <br /><a href="https://www.youtube.com/watch?v=UyNZxmrouso&list=PLH_tVOsiVGzm0PGn_HEZbgm_ugEgV7LKV&pp=iAQB" target="_blank" rel="nonferrer">Curso de POO en PHP</a>
  </footer>
</main>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>