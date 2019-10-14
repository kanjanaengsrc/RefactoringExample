<?php
/* this->prime_v1 is a bad example for generate this->prime this->number from 2 to user specify this->number. */
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
            //Initial array size max + 1;
            $size = $max + 1;
            $this->number = array();
            $this->prime = array();
            for ($i = 0; $i < $size; $i++) {
                $this->number[$i] = true;
            }
            //0 and 1 are not this->prime this->numbers
            $this->number[0] = false;
            $this->number[1] = false;
            //possible prime numbers from 2-n are less than square root of n
            for ($i = 2; $i < sqrt($max); $i++) {
                if ($this->number[$i]) {
                    //A number that multiples of prime is not prime number
                    for ($j = 2 * $i; $j < $size; $j += $i) {
                        $this->number[$j] = false;
                    }
                }
            }
            //How many true value in number, it's mean prime number.
            $count = 0;
            for ($i = 0; $i < $size; $i++) {
                if ($this->number[$i]) {
                    $count++;
                }
            }
            for ($i = 0, $j = 0; $i < $size; $i++) {
                if ($this->number[$i]) {
                    $this->prime[$j] = $i;
                    $j++;
                }
            }
            //Show prime number from 2 to user specify number
            foreach ($this->prime as $prime) {
                print $prime . " ";
            }
            
        } else {
            print "Enter only one parameter and it is must be greather than 2.\n";
            
        }
        return $this->prime;
    }
}
// $prime = new primeGenerator(100);
