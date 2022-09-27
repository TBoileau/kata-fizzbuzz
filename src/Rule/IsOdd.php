<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Rule;

final class IsOdd extends Rule
{
    public function __construct(string $result)
    {
        parent::__construct($result);
    }

    public function match(int $input): bool
    {
        return $input % 2 !== 0;
    }
}
