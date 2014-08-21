<?php

/**
* This class is the start to an extensible calculator emulation model.
* We are limited in scope here, but we'll 'try' to observe such OOP
* standards as:
* encapsulation - private-protected-public:
* error handling by each module:
* loose coupling - no importing other libraries if possible:
* cohesion or grouping:
* inheritance - in the future.
*
* Since we are limited in scope and time here: Off the top of my head
* I don't see using an interface or pattern in the design necessary
* at this point.
*/
class CalculatorEmulator {
	/*****************************************************
	* Keeping instance varibles private: encapsulation.  *
	*****************************************************/
	
	/**
	* The expression passed in to be evalauted.
	* Will consider expresssion string to be cast
	* before operation.
	*
	* @var string $expression
	*/
	private $expression;
	
	/**
	* This is the end result from the passed in expression.
	* Passed back as a string to be cast as needed.
	*
	* @var string $result
	*/
	private $result;
	
	/**
	* Probably going to break expression into some kind of
	* array to set the order of evaluation by the math methods.
	*
	* @var array $expression_arr
	*/
	private $expresssion_arr = array();
	
	/**
	* Probably could need at least one temp variable while looping
	* through expression during evaluation to pass around.
	*
	* @var integer $temp1
	*/
	private $temp1;
	
	
	
	/**
	* Default constructor.
	*/
	public function __construct() {}
	
	
	/*********************************************************
	* The math methods are kept private in scope as I don't  *
	* see them needing to be altered. We could change to     *
	* protected if that changes though.                      *
	*********************************************************/
	
	
	/**
	* Multiply the product variables.
	* We are going to presume integers but floats
	* would be processed just as well.
	*
	* @param integer $prod1
	* @param integer $prod2
	*
	* @return integer $product
	*
	* @throws Exception
	*/
	private multiplyProducts($prod1, $prod2) {
		$product = null;
		
		if (empty($prod1) || empty($prod2)) throw new Exception('Two values required to multiply.');
		else return $product = $prod1 * $prod2;
	}
	
	/**
	* Divide the quotient variables.
	* Need to think about float as return val.
	*
	* @param integer $quot1
	* @param integer $quot2
	*
	* @return float $quotient  // ? : need to flesh this out
	*
	* @throws Excpetion
	*/
	private function divideQuotients($quot1, $quot2) {
		$quotient = null;
		
		if (empty($quot1) || empty($quot2)) throw new Excpetion('Two values required for division.');
		else if ($quot2 <= 0) throw new Exception('Divisor needs to be greater than zero.');
		else return $quotient = $quot1 / $quot2;
	}
	
	/**
	* Get the modulas of two values.
	* Need to think how this affects value of expression.
	*
	* @parma integer $val1
	* @param integer $val2
	*
	* @return integer $is_factor
	*
	* @throws Expression
	*/
	private function modulasValues($val1, $val2) {
		$is_factor = null;
		
		if (empty($val1) || empty($val2)) throw new Exception('Modulas requires 2 values to be evaluated.');
		else return $is_factor = $val1 % $val2;
	}
	
	/**
	* Add two values.
	*
	* @param integer $sum1
	* @param integer $sum2
	*
	* @return integer $sum
	*
	* @throws Exception
	*/
	private addSums($sum1, $sum2) {
		$sum = null;
		
		if (empty($sum1) || empty($sum2)) throw new Exception('Two values are required for addition.');
		else return $sum = $sum1 + $sum2;
	}
	
	/**
	* Subtract one value from another.
	*
	* @param integer $diff1
	* @param integer $diff2
	*
	* @retrun integer $difference
	*
	* @throws Exception
	*/
	private subtractDifferences($diff1, $diff2) {
		$difference = null;
		
		if (empty($diff1) || empty($diff2)) throw new Exception('Two values required for subtraction.');
		else return $difference = $diff1 - $diff2;
	}
	
	
	/*******************************************************************
	* These methods could possibly be altered for necessity or other   *
	* So they are protected for inheritance later or                   *
	* over writing as necessity requires: extensibility.               *
	* These are the crux of the process and need to be fleshed out.    *
	*******************************************************************/
	
	/**
	* This method would parse out the expression string into an array for sorting.
	* This method may need to be its own class perhaps. But we'll keep it here for now.
	*
	* @param string $expression
	*
	* @return array $exp_arr
	*
	* @throws Exception
	*/
	protected function parseExpression($expression) {
		$exp_arr = array();
		
		if(empty($expression)) throw new Exception('Expression required for evaluation.');
		// explode string by array of operators : need ot work this out
		
		...
	}
	
	/**
	* Figure out how to sort the array to do the evalutions regarding associativity.
	*/
	protected sortExpression($expression_array) {
	 ...
	}
	
	/**
	* Cast the expression values as integer or float if we expect floats in string.
	* The expression will have to be passed in as tring since it wil contain
	* operators: and in the future possibly parentheses.
	*/
	protected castExpression($val) {
		// something like...
		if strstr($val, '.') return floatval($val);
		else return intval($val);
	}
	
	/**
	* Loop through the expression array and cal the relevant math method
	* for each elelment of the sortede expression array.
	*/
	protected function evaluteExpressionArray($expression_array) {
		foreach...
	}
	
	/**********
	* setters *
	***********/
	
	
	/**
	* Set the expression to be evaluated.
	*
	* @param string $expression
	*
	* @throws Exception
	*/
	public function setExpression($expression) {
		if (empty($expression)) throw new Exception('Expression to be evaluated required.');
		// else
		$this->expression = $expression;
	}
	
	/**
	* Set the result to be returned.
	*/
	public function setResult($result) {
		if (empty($result)) throw Exception('Not a valid result.');
		// else
		$this->result = $result;
	}
	
	
	/**********
	* getters *
	***********/
	
	
	/**
	* Get the $expression to be evaluated.
	*
	* @return string $this->expression on success
	*/
	public function getExpression() {
		if (!empty($this->expression)) return $this->expression;
		else return false;  // no need to break or stop with exception
	}
	
	/**
	* Get the $result.
	* Reurn string value of result to be
	* cast as need just in case floats are
	* considered for future use.
	*
	* @return string $this->result on success
	*/
	public function getResult() {
		if (!empty($this->result)) return strval($this->result);
		else return false;
	}
	
	
	/************************************************************************************
	* Generic setters and getters for extensibility or ease of use : on the fly stuff.  *
	************************************************************************************/
	
	
	/**
	* Set any settable property of this class that exists.
	*
	*/
	public function set($prop, $value) {
		if(property_exists($this, $prop)) {
			$this->$prop = $value;
			return true;
		}
        return false;
	}

	/**
	* Get whatever property.
	*
	*/
	public function get($prop) {
		if ($this->$prop) {
			return $this->$prop;
		}
		else {
			return false;
		}
	}
	
	/**
	* Default destructor.
	*/
	public function __destruct() {}
}