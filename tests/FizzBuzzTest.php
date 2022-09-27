<?php

declare(strict_types=1);

namespace TBoileau\Kata\FizzBuzz\Tests;

use Generator;
use PHPUnit\Framework\TestCase;
use TBoileau\Kata\FizzBuzz\FizzBuzz;
use TBoileau\Kata\FizzBuzz\Rule\DivisibleBy;
use TBoileau\Kata\FizzBuzz\Rule\IsOdd;
use TBoileau\Kata\FizzBuzz\Rule\NotDivisibleBy;
use TBoileau\Kata\FizzBuzz\Rule\PerfectSquare;

final class FizzBuzzTest extends TestCase
{
    /**
     * @dataProvider provideIteration1
     */
    public function testIteration1(int $input, string $result): void
    {
        $fizzBuzz = new FizzBuzz(
            new DivisibleBy(3, 'Fizz'),
            new DivisibleBy(5, 'Buzz'),
        );
        self::assertSame($result, $fizzBuzz($input));
    }

    public function provideIteration1(): Generator
    {
        yield [1, '1'];
        yield [2, '2'];
        yield [3, 'Fizz'];
        yield [4, '4'];
        yield [6, 'Fizz'];
        yield [5, 'Buzz'];
        yield [10, 'Buzz'];
        yield [15, 'FizzBuzz'];
        yield [30, 'FizzBuzz'];
    }

    /**
     * @dataProvider provideIteration2
     */
    public function testIteration2(int $input, string $result): void
    {
        $fizzBuzz = new FizzBuzz(
            new DivisibleBy(7, 'Fizz'),
            new DivisibleBy(11, 'Buzz'),
        );
        self::assertSame($result, $fizzBuzz($input));
    }

    public function provideIteration2(): Generator
    {
        yield [1, '1'];
        yield [2, '2'];
        yield [7, 'Fizz'];
        yield [11, 'Buzz'];
        yield [77, 'FizzBuzz'];
        yield [7*11*2, 'FizzBuzz'];
    }

    /**
     * @dataProvider provideIteration3
     */
    public function testIteration3(int $input, string $result): void
    {
        $fizzBuzz = new FizzBuzz(
            new DivisibleBy(13, 'Fizz'),
            new DivisibleBy(17, 'Buzz'),
            new DivisibleBy(19, 'Fuzz'),
            new DivisibleBy(23, 'Bizz'),
        );
        self::assertSame($result, $fizzBuzz($input));
    }

    public function provideIteration3(): Generator
    {
        yield [1, '1'];
        yield [2, '2'];
        yield [13, 'Fizz'];
        yield [17, 'Buzz'];
        yield [19, 'Fuzz'];
        yield [23, 'Bizz'];
        yield [13*17, 'FizzBuzz'];
        yield [13*19, 'FizzFuzz'];
        yield [13*23, 'FizzBizz'];
        yield [17*19, 'BuzzFuzz'];
        yield [17*23, 'BuzzBizz'];
        yield [19*23, 'FuzzBizz'];
        yield [13*17*19, 'FizzBuzzFuzz'];
        yield [13*17*23, 'FizzBuzzBizz'];
        yield [13*19*23, 'FizzFuzzBizz'];
        yield [17*19*23, 'BuzzFuzzBizz'];
        yield [13*17*19*23, 'FizzBuzzFuzzBizz'];
    }

    /**
     * @dataProvider provideIteration4
     */
    public function testIteration4(int $input, string $result): void
    {
        $fizzBuzz = new FizzBuzz(
            new NotDivisibleBy(3, 'Fizz'),
            new IsOdd('Buzz'),
            new PerfectSquare('Fuzz'),
        );
        self::assertSame($result, $fizzBuzz($input));
    }

    public function provideIteration4(): Generator
    {
        yield [1, 'FizzBuzzFuzz'];
        yield [2, 'Fizz'];
        yield [3, 'Buzz'];
        yield [6, '6'];
        yield [4, 'FizzFuzz'];
        yield [9, 'BuzzFuzz'];
        yield [16, 'FizzFuzz'];
        yield [49, 'FizzBuzzFuzz'];
        yield [7, 'FizzBuzz'];
    }
}
