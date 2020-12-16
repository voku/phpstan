<?php declare(strict_types = 1);

namespace PHPStan\Reflection\Php;

use PHPStan\Reflection\ClassReflection;
use PHPStan\TrinaryLogic;
use PHPStan\Type\Type;

class UniversalObjectCrateProperty implements \PHPStan\Reflection\PropertyReflection
{

	/** @var \PHPStan\Reflection\ClassReflection */
	private $declaringClass;

	/** @var \PHPStan\Type\Type */
	private $type;

	public function __construct(
		ClassReflection $declaringClass,
		Type $type
	)
	{
		$this->declaringClass = $declaringClass;
		$this->type = $type;
	}

	public function getDeclaringClass(): ClassReflection
	{
		return $this->declaringClass;
	}

	public function isStatic(): bool
	{
		return false;
	}

	public function isPrivate(): bool
	{
		return false;
	}

	public function isPublic(): bool
	{
		return true;
	}

	public function getReadableType(): Type
	{
		return $this->type;
	}

	public function getWritableType(): Type
	{
		return $this->type;
	}

	public function canChangeTypeAfterAssignment(): bool
	{
		return true;
	}

	public function isReadable(): bool
	{
		return true;
	}

	public function isWritable(): bool
	{
		return true;
	}

	public function isDeprecated(): TrinaryLogic
	{
		return TrinaryLogic::createNo();
	}

	public function getDeprecatedDescription(): ?string
	{
		return null;
	}

	public function isInternal(): TrinaryLogic
	{
		return TrinaryLogic::createNo();
	}

	/** @return string|false */
	public function getDocComment()
	{
		return false;
	}

}