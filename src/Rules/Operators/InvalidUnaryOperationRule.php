<?php declare(strict_types = 1);

namespace PHPStan\Rules\Operators;

use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleError;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\Type\ErrorType;
use PHPStan\Type\VerbosityLevel;

class InvalidUnaryOperationRule implements \PHPStan\Rules\Rule
{

	public function getNodeType(): string
	{
		return \PhpParser\Node\Expr::class;
	}

	/**
	 * @param \PhpParser\Node\Expr $node
	 * @param \PHPStan\Analyser\Scope $scope
	 * @return RuleError[]
	 */
	public function processNode(\PhpParser\Node $node, Scope $scope): array
	{
		if (
			!$node instanceof \PhpParser\Node\Expr\UnaryPlus
			&& !$node instanceof \PhpParser\Node\Expr\UnaryMinus
		) {
			return [];
		}

		if ($scope->getType($node) instanceof ErrorType) {
			return [
				RuleErrorBuilder::message(sprintf(
					'Unary operation "%s" on %s results in an error.',
					$node instanceof \PhpParser\Node\Expr\UnaryPlus ? '+' : '-',
					$scope->getType($node->expr)->describe(VerbosityLevel::value())
				))->line($node->expr->getLine())->build(),
			];
		}

		return [];
	}

}