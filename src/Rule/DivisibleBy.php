<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Rule;

final class DivisibleBy extends Rule
{
    public function __construct(private int $number, string $result)
    {
        parent::__construct($result);
    }

    public function match(int $input): bool
    {
        return $input % $this->number === 0;
    }
}
