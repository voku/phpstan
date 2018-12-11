<?php declare(strict_types = 1);

namespace PHPStan\Reflection;

interface ReflectionWithFilename
{

	/**
	 * @return false|string
	 */
	public function getFileName();

}
