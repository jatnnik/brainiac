<?php

use Jannbar\Brainiac\Brainiac;
use Jannbar\Brainiac\Exceptions\BigNumberException;
use Jannbar\Brainiac\Exceptions\InvalidFloatException;
use Jannbar\Brainiac\Exceptions\InvalidIntegerException;
use Jannbar\Brainiac\Exceptions\InvalidNumberException;
use Jannbar\Brainiac\Exceptions\SmallNumberException;

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
