<?php

function Titulo()
{
  $titulo = "\t\t****OBJETO DE UN CARRO****\n\n";
  return $titulo;
}

//Clase de Carro
class Cambio
{
  private int $cambioActual = 0;

  public function SubirCambio(string $tipoTransmision): string
  {
    $tipoTransmision = strtoupper($tipoTransmision);

    if ($tipoTransmision === "MANUAL") {

      if ($this->cambioActual == 6) {

        return "<br />El carro no puede subir mas cambios...";
      }
      $this->cambioActual += 1;
      return "<br />Se ha subido un cambio...";
    } //Mientras el carro sea manual

    return "<br />Transmision automatica, no se puede hacer cambios...";
  }

  public function BajarCambio(string $tipoTransmision)
  {
    $tipoTransmision = strtoupper($tipoTransmision);
    if ($tipoTransmision === "MANUAL") {

      if ($this->cambioActual == -1) {
        return "<br />El carro no puede bajar mas cambios...";
      }
      $this->cambioActual -= 1;
      return "<br />Se ha subido un cambio...";
    } //Mientras el carro sea manual
    return "<br />Transmision automatica, no se puede hacer cambios...";
  }
  //Todo Para retroceder, Palancacambio = cambioActual -1 

  //Todo Para Neutral, Palancacambio = cambioActual 0


  public function GetCambioActual(string $tipoTransmision): string
  {
    $tipoTransmision = strtoupper($tipoTransmision);
    if ($tipoTransmision === "MANUAL") { // Mientras la transmision sea manual...
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
    return "Auntomatica..."; // Si es automatica esta en una marcha automatica... 
  }
}

class Carro
{
  //Propiedades
  public string $marca;
  public string $modelo;
  public string $color;

  private int $ano;
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
    if ($this->retrocediendo && $this->avanzando = false) {
      return "<br />El carro no puede avanzar mientras retrocede...";
    } elseif (!$this->encendido) {
      return "<br />El carro no puede avanzar porque esta apagado...";
    }
    $this->avanzando = true;
    return "<br />El carro " . $this->marca . " " . $this->modelo . " esta avanzando...";
  }

  public function Retroceder(): string
  {
    if ($this->avanzando && $this->retrocediendo = false) {
      return "<br />El carro no puede retroceder mientras avanza...";
    } elseif (!$this->encendido) {
      return "<br />El carro no puede retroceder porque esta apagado...";
    }
    $this->retrocediendo = true;
    return "<br />El carro " . $this->marca . " " . $this->modelo . " esta retrocediendo...";
  }

  public function Frenar(): string
  {
    if (!$this->avanzando) {
      return "<br />El carro se ha franado aunque no este avanzando...";
    }
    $this->avanzando = false;
    return "<br />El carro se ha frenado completamente...";
  }

  public function Girar($direccion): string
  {
    if (!$this->avanzando) {
      return "<br />El carro no esta en movimiento asi que no puede girar...";
    }
    return "<br />El carro esta girando a la $direccion ";
  }

  public function SubirCambio()
  {
    return $this->palancaCambio->SubirCambio($this->transmision);
  }

  public function BajarCambio()
  {
    return $this->palancaCambio->BajarCambio($this->transmision);
  }

  //Setters

  public function SetBool($bool): string // True = Si, False = No
  {
    if ($bool) {
      return "Si...";
    } else {
      return "No...";
    }
  }

  public function SetAno($ano)
  {
    $this->ano = $ano;
  }

  public function SetPlaca($placa)
  {
    $this->placa = $placa;
  }

  public function SetKilometraje($kilometraje)
  {
    $this->kilometraje = $kilometraje;
  }

  public function SetTanqueGas($tanqueGas)
  {
    $this->tanqueGas = $tanqueGas;
  }

  public function SetGasNvl($gasNvl)
  {
    $this->gasNvl = $gasNvl;
  }

  public function SetMotorTipo($motorTipo)
  {
    $this->motorTipo = $motorTipo;
  }

  public function SetConsumo($consumo)
  {
    $this->consumo = $consumo;
  }
  public function SetTransmision($transmision)
  {
    $this->transmision = $transmision;
  }

  public function SetNroPuertas($nroPuertas)
  {
    $this->nroPuertas = $nroPuertas;
  }

  public function SetNroRuedas($nroRuedas)
  {
    $this->nroRuedas = $nroRuedas;
  }

  public function SetTraccionTipo($traccionTipo)
  {
    $this->traccionTipo = $traccionTipo;
  }

  public function SetMaxPasajeros($maxPasajeros)
  {
    $this->maxPasajeros = $maxPasajeros;
  }

  public function SetMaxCarga($maxCarga)
  {
    $this->maxCarga = $maxCarga;
  }

  public function SetPrecio($precio)
  {
    $this->precio = $precio;
  }

  //Constructor
  public function __construct(
    $marca,
    $modelo,
    $color,
    $ano,
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
    $this->SetKilometraje($kilometraje);
    $this->SetAno($ano);
    $this->SetPlaca($placa);
    $this->SetKilometraje($kilometraje);
    $this->SetTanqueGas($tanqueGas);
    $this->SetGasNvl($gasNvl);
    $this->SetMotorTipo($motorTipo);
    $this->SetConsumo($consumo);
    $this->SetTransmision($transmision);
    $this->SetNroPuertas($nroPuertas);
    $this->SetNroRuedas($nroRuedas);
    $this->SetTraccionTipo($traccionTipo);
    $this->SetMaxPasajeros($maxPasajeros);
    $this->SetMaxCarga($maxCarga);
    $this->SetPrecio($precio);
    $this->palancaCambio = new Cambio($this->transmision);
  } //TODO IMPLEMENTAR VALIDACION PARA LAS PROPIEDADES PRIVADAS

  // Getters

  public function GetEstado(): string
  {
    return $info =
      "<br />El carro esta encendido: " . $this->SetBool($this->encendido) .
      "<br />El carro esta avanzando: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta retrocediendo: " . $this->SetBool($this->avanzando) .
      "<br />El carro esta la marcha: " . $this->palancaCambio->GetCambioActual($this->transmision);
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
            <br />El año es: $this->ano, 
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


//TODO REALIZAR FUNCION QUE RECIBA DATOS POR EL USUARIO HACERCA DEL CARRO A HACER... 

//Solicitamos los parametros del carro para poder asignarlo al object
echo Titulo();

$marca = readline("Ingrese la marca: ");
$modelo = readline("Ingrese el modelo: ");
$color = readline("Ingrese el color: ");
$ano = readline("Ingrese el año: ");
$placa = readline("Ingrese la placa: ");
$kilometraje = readline("Ingrese el kilometraje: ");
$tanqueGas = readline("Ingrese la capacidad de combustible: ");
$gasNvl = readline("Ingrese el nivel actual de combustible: ");
$motorTipo = readline("Ingrese el tipo de motor: ");
$consumo = readline("Ingrese el consumo por km: ");
$transmision = readline("Ingrese el tipo de transmision (Automatico / Manual): ");
$nroPuerta = readline("Ingrese el Numero de puertas: ");
$nroRuedas = readline("Ingrese el Numero de ruedas: ");
$traccionTipo = readline("Ingrese tipo de traccion (RWD / FWD / AWD / 4WD): ");
$maxPasajeros = readline("Ingrese a capacidad maxima de pasajeros: ");
$maxCarga = readline("Ingrese la carga maxima: ");
$precio = readline("Ingrese el precio de concesionario: ");

$corolla = new Carro(
  $marca,
  $modelo,
  $color,
  $ano,
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
);

echo $corolla->GetInfoCarro();

?>


<!--VISUALIZAR-->

<main>
  <title>OOP Carro </title>

  <h1>Caracteristicas del carro</h1>
  <?= $corolla->GetInfoCarro(); ?>

  <h1>Acciones que realiza el carro</h1>
  <?= $corolla->Encender() . $corolla->Avanzar() . $corolla->Girar("Derecha") . $corolla->SubirCambio(); ?>

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