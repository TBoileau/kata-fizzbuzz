<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Rule;

interface RuleInterface
{
    public function match(int $input): bool;

    public function getResult(): string;
}
