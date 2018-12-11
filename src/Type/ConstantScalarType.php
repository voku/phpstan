<?php declare(strict_types = 1);

namespace PHPStan\Type;

interface ConstantScalarType extends ConstantType
{

	/**
	 * @return bool|float|int|string|null
	 */
	public function getValue();

}
