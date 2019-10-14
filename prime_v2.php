<?php

/**prime_v2 is improved from prime_v1 using
 * 1. Extract Method
 * 2. Using standard function
 *  */
namespace v2;
class primeGenerator
{
    private $number;
    private $prime;
    public function __construct()
    {
        $this->number = array();
        $this->prime = array();
    }
    public function generatePrimes($max)
    {
        if ($max > 2) {
            $size = $max + 1;
            $this->initializeArray($size);
            $this->sieve($max, $size);
            $this->load2PrimesList();      
        } else {
            //print "Enter only one parameter and it is must be greather than 2.\n";
        }
        return $this->prime;
    }
    private function initializeArray($size)
    {
        for ($i = 0; $i < $size; $i++) {
            $this->number[$i] = true;
        }
        //0 and 1 are not prime numbers
        $this->number[0] = false;
        $this->number[1] = false;
    }
    private function sieve($max, $size) 
    {
        //Filter multiples of 2 out of prime list by setting value as false
        for ($i = 2; $i < sqrt($max); $i++) {
            if ($this->number[$i]) {
                //A number that multiples of prime is not prime number
                for ($j = 2 * $i; $j < count($this->number); $j += $i) {
                    $this->number[$j] = false;
                }
            }
        }
    }
    private function load2PrimesList()
    {
        for ($i = 0, $j = 0; $i < count($this->number); $i++) {
            if ($this->number[$i]) {
                $this->prime[$j] = $i;
                $j++;
            }
        }
    }
    public function showPrimes(){
        foreach($this->prime as $prime){
            print $prime ." ";
        }
    }
}
// $prime = new primeGenerator2();
// $prime->generatePrimes(10);
// $prime->showPrimes();
