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

        return "El carro no puede subir mas cambios...\n";
      }
      $this->cambioActual += 1;
      return "Se ha subido un cambio...\n";
    } //Mientras el carro sea manual

    return "Transmision automatica, no se puede hacer cambios manualmente...\n";
  }

  public function BajarCambio(string $tipoTransmision)
  {
    $tipoTransmision = strtoupper($tipoTransmision);
    if ($tipoTransmision === "MANUAL") {

      if ($this->cambioActual == -1) {
        return "El carro no puede bajar mas cambios...\n";
      }
      $this->cambioActual -= 1;
      return "Se ha subido un cambio...\n";
    } //Mientras el carro sea manual
    return "Transmision automatica, no se puede hacer cambios manualmente...\n";
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
      return "El carro ya esta encendido...\n";
    }
    $this->encendido = true;
    return "El carro se ha encendido...\n";
  }

  public function Apagar(): string
  {
    if (!$this->encendido) {
      return "El carro ya esta apagado...\n";
    }
    $this->encendido = false;
    return "El carro se ha apagado...\n";
  }

  public function Avanzar(): string
  {
    if ($this->retrocediendo && $this->avanzando = false) {
      return "El carro no puede avanzar mientras retrocede...\n";
    } elseif (!$this->encendido) {
      return "El carro no puede avanzar porque esta apagado...\n";
    }
    $this->avanzando = true;
    return "El carro " . $this->marca . " " . $this->modelo . " esta avanzando...\n";
  }

  public function Retroceder(): string
  {
    if ($this->avanzando && $this->retrocediendo = false) {
      return "El carro no puede retroceder mientras avanza...\n";
    } elseif (!$this->encendido) {
      return "El carro no puede retroceder porque esta apagado...\n";
    }
    $this->retrocediendo = true;
    return "El carro " . $this->marca . " " . $this->modelo . " esta retrocediendo...\n";
  }

  public function Frenar(): string
  {
    if (!$this->avanzando) {
      return "El carro se ha franado aunque no este avanzando...\n";
    }
    $this->avanzando = false;
    return "El carro se ha frenado completamente...\n";
  }

  public function Girar($direccion): string
  {
    if (!$this->avanzando) {
      return "El carro no esta en movimiento asi que no puede girar...\n";
    }
    return "El carro esta girando a la $direccion...\n";
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

  public function SetAno(int $ano)
  {
    $this->ano = $ano;
  }

  public function SetPlaca(string $placa)
  {
    $this->placa = $placa;
  }

  public function SetKilometraje(int $kilometraje)
  {
    $this->kilometraje = $kilometraje;
  }

  public function SetTanqueGas(int $tanqueGas)
  {
    $this->tanqueGas = $tanqueGas;
  }

  public function SetGasNvl(int $gasNvl)
  {
    $this->gasNvl = $gasNvl;
  }

  public function SetMotorTipo(string $motorTipo)
  {
    $this->motorTipo = $motorTipo;
  }

  public function SetConsumo(int $consumo)
  {
    $this->consumo = $consumo;
  }
  public function SetTransmision(string $transmision)
  {
    $this->transmision = $transmision;
  }

  public function SetNroPuertas(int $nroPuertas)
  {
    $this->nroPuertas = $nroPuertas;
  }

  public function SetNroRuedas(int $nroRuedas)
  {
    $this->nroRuedas = $nroRuedas;
  }

  public function SetTraccionTipo(string $traccionTipo)
  {
    $this->traccionTipo = $traccionTipo;
  }

  public function SetMaxPasajeros(int $maxPasajeros)
  {
    $this->maxPasajeros = $maxPasajeros;
  }

  public function SetMaxCarga(int $maxCarga)
  {
    $this->maxCarga = $maxCarga;
  }

  public function SetPrecio(float $precio)
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
      "\nEl carro esta encendido: " . $this->SetBool($this->encendido) .
      "\nEl carro esta avanzando: " . $this->SetBool($this->avanzando) .
      "\nEl carro esta retrocediendo: " . $this->SetBool($this->avanzando) .
      "\nEl carro esta la marcha: " . $this->palancaCambio->GetCambioActual($this->transmision);
  }

  public function GetKm(): string
  {
    return "\nLos kilometrajes son " . $this->kilometraje . " Km";
  }

  public function GetInfoCarro()
  {
    $info = "
      La marca es:  $this->marca,
      El modelo es: $this->modelo,
      El color es:  $this->color,
      El año es: $this->ano, 
      La placa es: $this->placa,
      El kilometraje es: $this->kilometraje Km,
      La capacidad de gasolina es: $this->tanqueGas Lts,
      El nivel de la gasolina es: $this->gasNvl Lts, 
      El tipo de motor es: $this->motorTipo,
      Su consumo es de: $this->consumo litros por Km, 
      Tipo de transmision es: $this->transmision, 
      Total de puertas: $this->nroPuertas, 
      Total de ruedas: $this->nroRuedas, 
      Tipo de traccion: $this->traccionTipo, 
      Capacidad Max de Pasajeros: $this->maxPasajeros,
      Capacidad Max de Carga: $this->maxCarga,
      Precio de concesionario: $this->precio $ \n";

    return $info;
  }
}


//TODO REALIZAR FUNCION QUE RECIBA DATOS POR EL USUARIO HACERCA DEL CARRO A HACER... 

//Solicitamos los parametros del carro para poder asignarlo al object por consola
echo Titulo();

// $marca = readline("Ingrese la marca: ");
// $modelo = readline("Ingrese el modelo: ");
// $color = readline("Ingrese el color: ");
// $ano = readline("Ingrese el año: ");
// $placa = readline("Ingrese la placa: ");
// $kilometraje = readline("Ingrese el kilometraje: ");
// $tanqueGas = readline("Ingrese la capacidad de combustible: ");
// $gasNvl = readline("Ingrese el nivel actual de combustible: ");
// $motorTipo = readline("Ingrese el tipo de motor: ");
// $consumo = readline("Ingrese el consumo por km: ");
// $transmision = readline("Ingrese el tipo de transmision (Automatico / Manual): ");
// $nroPuertas = readline("Ingrese el Numero de puertas: ");
// $nroRuedas = readline("Ingrese el Numero de ruedas: ");
// $traccionTipo = readline("Ingrese tipo de traccion (RWD / FWD / AWD / 4WD): ");
// $maxPasajeros = readline("Ingrese a capacidad maxima de pasajeros: ");
// $maxCarga = readline("Ingrese la carga maxima: ");
// $precio = readline("Ingrese el precio de concesionario: ");

// $corolla = new Carro(
//   $marca,
//   $modelo,
//   $color,
//   $ano,
//   $placa,
//   $kilometraje,
//   $tanqueGas,
//   $gasNvl,
//   $motorTipo,
//   $consumo,
//   $transmision,
//   $nroPuertas,
//   $nroRuedas,
//   $traccionTipo,
//   $maxPasajeros,
//   $maxCarga,
//   $precio
// );

// Ingreso de datos por codigo

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
  "Automatico",
  5,
  4,
  "Trasera",
  5,
  200,
  12000,
);

echo $corolla->GetInfoCarro();
echo $corolla->Avanzar();
