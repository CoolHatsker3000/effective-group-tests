<?php 
	define("COUNT",2000000);
	/**
	 * 
	 
	class PrimeCollector
	{
		public $primes=[];
		public function __construct($start)
		{
			$primes=$start;
		}
		public isPrime($number)
		{
			foreach ($primes as $key => $value) {
				if ($number%$value == 0){
					return 0;
				}
			}
			return 1;
		}
	}
	for ($i=10; $i <=2000000 ; $i+=2) { 
		
	}
	*/
	$numbers=str_repeat("\1", COUNT+1);
	$numbers[0]="\0";
	$numbers[1]="\0";
	$sum=0;
	for ($i=2;$i<=COUNT;$i++){
			if ($numbers[$i]==="\1"){
				$sum+=$i;
			for($j=$i*$i;$j<=COUNT;$j+=$i){
				$numbers[$j]="\0";

			}
		}
	}
	echo $sum;
 ?>