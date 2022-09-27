<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz;

use TBoileau\Kata\FizzBuzz\Rule\RuleInterface;

final class FizzBuzz
{
    /**
     * @var array<array-key, RuleInterface>
     */
    private array $rules;

    public function __construct(RuleInterface ...$rules)
    {
        $this->rules = $rules;
    }

    public function __invoke(int $input): string
    {
        $result = '';

        foreach ($this->rules as $rule) {
            if ($rule->match($input)) {
                $result .= $rule->getResult();
            }
        }

        return $result === '' ? (string) $input : $result;
    }
}
