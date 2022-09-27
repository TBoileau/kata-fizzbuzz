<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Rule;

final class PerfectSquare extends Rule
{
    public function __construct(string $result)
    {
        parent::__construct($result);
    }

    public function match(int $input): bool
    {
        return fmod(sqrt($input), 1) == 0;
    }
}
