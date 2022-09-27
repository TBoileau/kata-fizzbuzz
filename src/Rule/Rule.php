<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Rule;

abstract class Rule implements RuleInterface
{
    public function __construct(private string $result)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
