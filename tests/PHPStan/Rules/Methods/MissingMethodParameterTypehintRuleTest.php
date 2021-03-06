<?php declare(strict_types = 1);

namespace PHPStan\Rules\Methods;

use PHPStan\Rules\MissingTypehintCheck;

class MissingMethodParameterTypehintRuleTest extends \PHPStan\Testing\RuleTestCase
{

	protected function getRule(): \PHPStan\Rules\Rule
	{
		return new MissingMethodParameterTypehintRule(new MissingTypehintCheck());
	}

	public function testRule(): void
	{
		$this->analyse([__DIR__ . '/data/missing-method-parameter-typehint.php'], [
			[
				'Method MissingMethodParameterTypehint\FooInterface::getFoo() has parameter $p1 with no typehint specified.',
				8,
			],
			[
				'Method MissingMethodParameterTypehint\FooParent::getBar() has parameter $p2 with no typehint specified.',
				15,
			],
			[
				'Method MissingMethodParameterTypehint\Foo::getFoo() has parameter $p1 with no typehint specified.',
				25,
			],
			[
				'Method MissingMethodParameterTypehint\Foo::getBar() has parameter $p2 with no typehint specified.',
				33,
			],
			[
				'Method MissingMethodParameterTypehint\Foo::getBaz() has parameter $p3 with no typehint specified.',
				42,
			],
			[
				'Method MissingMethodParameterTypehint\Foo::unionTypeWithUnknownArrayValueTypehint() has parameter $a with no value type specified in iterable type array.',
				58,
			],
		]);
	}

}
