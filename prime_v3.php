<?php
namespace v2;
/**prime_v3 is improved from prime_v2 using
 * 1. Change variable and function name easy to understand,
 *    such as changing $number to $crossedOutList. Then I have to change it's value follow the name.
 * 2. Get rid of variables I never use, such as isCrossed[0] and isCrossed[1]
 * 3. Create function for duplicate code, such as isNotCrossed()
 * 4. Separate fuzzy code into other function, such as crossOutMultiples and crossOutMultiplesOf 
 *  */
class primeGenerator
{
    private $crossedOutList; //change from number
    private $prime;
    public function __construct()
    {
        $this->crossedOutList = array();
        $this->prime = array();
    }
    public function generatePrimes($max)
    {
        if ($max > 2) {
            $size = $max + 1;
            $this->initializeArray($size);
            $this->crossOutMultiples($max, $size);
            $this->load2PrimesList();
        } else {
            print "Enter only one parameter and it is must be greather than 2.\n";
        }
        return $this->prime;
    }
    private function initializeArray($size)
    {
        for ($i = 2; $i < $size; $i++) {
            $this->crossedOutList[$i] = false;
        }
        // Rid of 0,1 since I change all array value to false and start from 2 to end of array
        // $this->crossedOutList[0] = false;
        // $this->crossedOutList[1] = false;
    }
    private function calcMaxPrime($max)
    {
        return (int) sqrt($max);
    }
    private function crossOutMultiplesOf($i)
    {
        //A number that multiples of prime is not prime number
        for ($multiple = 2 * $i; $multiple < count($this->crossedOutList); $multiple += $i) {
            $this->crossedOutList[$multiple] = true;
        }
    }
    private function isNotCrossed($i){
        return ($this->crossedOutList[$i]==false);
    }
    private function crossOutMultiples($max, $size) //Change function name from sieve
    {
        $maxPrime = $this->calcMaxPrime($max);
        for ($i = 2; $i < $maxPrime; $i++) {
            /*$this->crossedOutList[$i] == false is duplicate, 
            So create isNotCrossed function*/
            if ($this->isNotCrossed($i)) { 
                $this->crossOutMultiplesOf($i);
            }
        }
    }
    
    private function load2PrimesList()
    {
        for ($i = 2, $j = 0; $i < count($this->crossedOutList); $i++) {
            /*$this->crossedOutList[$i] == false is duplicate, 
            So create isNotCrossed function*/
            if ($this->isNotCrossed($i)) { 
                $this->prime[$j] = $i;
                $j++;
            }
        }
    }
    public function showPrimes()
    {
        foreach ($this->prime as $prime) {
            print $prime . " ";
        }
    }
}
// $prime = new primeGenerator3();
// $prime->generatePrimes(10);
// $prime->showPrimes();
