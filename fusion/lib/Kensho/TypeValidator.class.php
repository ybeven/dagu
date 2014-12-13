<?php
abstract class TypeValidator {
	/**
	 * Validate the $value with $validation
	 * @abstract
	 * @param mixed &$value
	 * @param string $validation
	 * @return boolean
	 */
	abstract public function validate(&$value, $validation);
	/**
	 * Compile the validation for $value to PHP code string
	 * @abstract
	 * @param mixed &$value
	 * @param string $validation
	 * @return string
	 */
	abstract public function compile(&$value, $validation);
	/**
	 * Get a TypeValidator by the name of the type
	 * @param string $typeName
	 * @return TypeValidator
	 */
	protected function getTypeValidator($typeName) {
		try {
			$typeClassName = ucfirst($typeName)."Validator";
			$typeClassReflection = new ReflectionClass($typeClassName);
			return $typeClassReflection->newInstance();
		} catch(ReflectionException $e) {
			return false;
		}
	}
}
?>