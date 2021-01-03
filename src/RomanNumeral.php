<?php
namespace PhpNwSykes;
use PhpNwSykes\InvalidNumeral;
class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {
        $total = 0;
        $key = 0;
        $numeralArray = str_split($this->numeral);                    #turns numeral string into array of characters
        
        foreach ($numeralArray as &$valueNum) {                              #going through every charcter in numeral
            if (in_array($valueNum, $this->symbols))          #checks is character is in array of symbols if not throws exception
                { } 
            else
            { 
                throw new InvalidNumeral; 
            } 
            foreach ($this->symbols as &$value) {                     #goes through every symbol to check for a match
            
                if( $valueNum == $value ){
                    $key_prev = $key;  
                    $key = array_search($value, $this->symbols);                   #Gets index from value       M gives 1000
                    
                    
                    if( $key_prev < $key && $key_prev != 0){                #if the previous value is lower than current value take away e.g I then X 
                        $total -= $key_prev;                                       # take I or 1 away from total twice due to counteracting the addition the previous time
                        $total -= $key_prev;
                        
                    }
                $total += $key;
            }
        }
        }
        return $total;
    }
}
