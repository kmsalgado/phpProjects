<?php 

class Viaje{

	private $preciobase;
	private $descuento;

	function Viaje($destino){

		if($destino=="Santa Marta"){
			$this->preciobase=100;
		}else if($destino=="San Andres"){
			$this->preciobase=200;
		}else{
			$this->preciobase=400;
		}

	}

function adultos($numero){
	$this->preciobase*=$numero;
}

function niños($numero2){
	$this->preciobase=70;
	$this->preciobase*=$numero2;
}

function bebidas(){
	$this->preciobase+=100;
}

function comidas(){
	$this->preciobase+=130;
}

function excurciones(){
	$this->preciobase+=230;
}

function hotel($destino){

		if($destino=="Santa Marta"){
			$this->preciobase+=40;
		}else if($destino=="San Andres"){
			$this->preciobase+=50;
		}else{
			$this->preciobase+=60;
		}

	}

	function get_preciobase(){
	return $this->preciobase - $this->descuento;
}

function descuentos($descuento){
	return $this->descuento = $descuento;
}

}

 ?>