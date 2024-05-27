<?php

//Clase de Carro
class Cambio
{
}

class Estado
{
}

class Carro
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

  //Estados 
  private $estados = [];
  private bool $encendido = false;
  private bool $avanzando = false;
  private bool $retrocediendo = false;
  private int $cambioActual = 0;

  // Metodos

  public function SetBool($bool): string
  {
    if ($bool) {
      return "Si...";
    } else {
      return "No...";
    }
  }

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

  public function MostrarKm(): string
  {
    return "<br />Los kilometrajes son " . $this->kilometraje . " Km";
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
  }

  public function GetEstado(): string
  {
    return $info =
      "<br />El carro esta encendido: " . $this->SetBool($this->encendido) .
      "<br />El carro esta avanzando: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta retrocediendo: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta la marcha: " . $this->cambioActual;
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

<main>
  <title>OOP Carro </title>
  <h1>Caracteristicas del carro</h1> <?= $corolla->GetInfoCarro(); ?>
  <h1>Estados del carro</h1> <?= $corolla->GetEstado() ?>
  <h1>Acción que realiza el carro</h1> <?= $corolla->Avanzar() . $corolla->Girar("Derecha"); ?>
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