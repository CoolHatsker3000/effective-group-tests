<?php 
	$string=file_get_contents("figures.json");
	/**
	 * 
	 */
	class Figure
	{
		function area()
		{	
		}
		function toString(){

		}
	}
	/**
	 * 
	 */
	class Circle extends Figure
	{
		private $radius;
		function Circle($radius)
		{
			$this->radius=$radius;
		}
		function area(){
			return pow($this->radius*pi(),2);
		}
		function toString(){
			$str = "Type: circle; area: ".$this->area()."<br>";
			return $str;
		}

	}
	class Triangle extends Figure{
		private $a;
		private $b;
		private $c;
		function Triangle($a, $b, $c)
		{
			$this->a=$a;
			$this->b=$b;
			$this->c=$c;
		}
		function area(){
			$p=($this->a+$this->b+$this->c)/2;
			return sqrt($p*($p-$this->a)*($p-$this->b)*($p-$this->c));
		}
		function toString(){
			$str = "Type: triangle; area: ".$this->area()."<br>";
			return $str;
		}

	}
	class Rectangle extends Figure{
		private $a;
		private $b;
		function Rectangle($a, $b)
		{
			$this->a=$a;
			$this->b=$b;
		}
		function area(){
			return $this->a*$this->b;
		}
		function toString(){
			$str = "Type: rectangle; area: ".$this->area()."<br>";
			return $str;
		}
	}
	$data=json_decode($string);
	$objects= array();
	foreach ($data as $key => $value) {
		switch ($value->type) {
			case 'circle':
				$objects[]=new Circle($value->radius);
				break;
			case 'triangle':
				$objects[]=new Triangle($value->a,$value->b,$value->c);
				break;
			case 'rectangle':
				$objects[]=new Rectangle($value->a,$value->b);
				break;
		}
	}
	function cmp($a,$b){
		if ($a->area()==$b->area()){
			return 0;
		}
		if ($a->area()>$b->area()){
			return -1;
		}
		else {
			return 1;
		}
	}
	usort($objects, "cmp");
	foreach ($objects as $key => $value) {
		echo $value->toString();
	}
 ?>