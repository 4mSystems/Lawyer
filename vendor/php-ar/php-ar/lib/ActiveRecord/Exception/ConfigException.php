<?php
/**
 * @package ActiveRecord
 */
namespace ActiveRecord\Exception;

/**
 * Thrown for configuration problems.
 *
 * @package ActiveRecord
 */
class ConfigException extends ActiveRecordException {};

/**
 * Thrown when attempting to access an invalid property on a {@link Model}.
 *
 * @package ActiveRecord
 */
class UndefinedPropertyException extends ModelException
{
	/**
	 * Sets the exception message to show the undefined property's name.
	 *
	 * @param str $property_name name of undefined property
	 * @return void
	 */
	public function __construct($class_name, $property_name)
	{
		if (is_array($property_name))
		{
			$this->message = implode("\r\n", $property_name);
			return;
		}

		$this->message = "Undefined property: {$class_name}->{$property_name} in {$this->file} on line {$this->line}";
		parent::__construct();
	}
};

/**
 * Thrown when attempting to perform a write operation on a {@link Model} that is in read-only mode.
 *
 * @package ActiveRecord
 */
class ReadOnlyException extends ModelException
{
	/**
	 * Sets the exception message to show the undefined property's name.
	 *
	 * @param str $class_name name of the model that is read only
	 * @param str $method_name name of method which attempted to modify the model
	 * @return void
	 */
	public function __construct($class_name, $method_name)
	{
		$this->message = "{$class_name}::{$method_name}() cannot be invoked because this model is set to read only";
		parent::__construct();
	}
};

/**
 * Thrown for validations exceptions.
 *
 * @package ActiveRecord
 */
class ValidationsArgumentError extends ActiveRecordException {};

/**
 * Thrown for relationship exceptions.
 *
 * @package ActiveRecord
 */
class RelationshipException extends ActiveRecordException {};

/**
 * Thrown for has many thru exceptions.
 *
 * @package ActiveRecord
 */
class HasManyThroughAssociationException extends RelationshipException {};
