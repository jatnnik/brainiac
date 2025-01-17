<?php

declare(strict_types=1);

use Jatnnik\Brainiac\Brainiac;
use Jatnnik\Brainiac\Exceptions\BigNumberException;
use Jatnnik\Brainiac\Exceptions\InvalidFloatException;
use Jatnnik\Brainiac\Exceptions\InvalidIntegerException;
use Jatnnik\Brainiac\Exceptions\InvalidNumberException;
use Jatnnik\Brainiac\Exceptions\LiteralNumberException;
use Jatnnik\Brainiac\Exceptions\NegativeNumberException;
use Jatnnik\Brainiac\Exceptions\PositiveNumberException;
use Jatnnik\Brainiac\Exceptions\SmallNumberException;

it('should parse numbers', function () {
    // Act & Assert.
    expect(Brainiac::number()->parse(42))->toEqual(42);
    expect(Brainiac::number()->parse(43.5))->toEqual(43.5);
    expect(Brainiac::number()->parse('42'))->toEqual(42);
});

it('should validate number size', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->min(20)->parse(10))->toThrow(
        SmallNumberException::class
    );

    expect(fn () => Brainiac::number()->max(10)->parse(20))->toThrow(
        BigNumberException::class
    );
});

it('should validate integers', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->int()->parse(1.0))->toThrow(InvalidIntegerException::class);
});

it('should validate floats', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->float()->parse(1))->toThrow(InvalidFloatException::class);
});

it('should throw for non numbers', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->parse('foo'))->toThrow(
        InvalidNumberException::class
    );
});

it('should not throw when using safe_parse', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->parse(42))
        ->not()
        ->toThrow(InvalidNumberException::class);
});

it('should throw for negative numbers', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->positive()->parse(-1))->toThrow(PositiveNumberException::class);
});

it('should validate positive numbers', function () {
    // Act & Assert.
    expect(Brainiac::number()->positive()->parse(1))->toEqual(1);
});

it('should throw for positive numbers', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->negative()->parse(1))->toThrow(NegativeNumberException::class);
});

it('should validate negative numbers', function () {
    // Act & Assert.
    expect(Brainiac::number()->negative()->parse(-1))->toEqual(-1);
});

it('should validate literal numbers', function () {
    // Act & Assert.
    expect(fn () => Brainiac::number()->literal(42)->parse(24))->toThrow(LiteralNumberException::class);

    expect(fn () => Brainiac::number()->literal(42)->parse(42))
        ->not()
        ->toThrow(LiteralNumberException::class);
});
