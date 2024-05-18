<?php

use Jannbar\Brainiac\Brainiac;
use Jannbar\Brainiac\Exceptions\InvalidArrayException;
use Jannbar\Brainiac\Exceptions\LongArrayException;
use Jannbar\Brainiac\Exceptions\ShortArrayException;

it('should parse arrays', function () {
    // Act & Assert.
    expect(Brainiac::array()->parse(['foo', 'bar']))->toEqual(['foo', 'bar']);
});

it('should throw for non arrays', function () {
    // Act & Assert.
    expect(fn () => Brainiac::array()->parse('foo'))->toThrow(
        InvalidArrayException::class
    );
});

it('should throw for too short arrays', function () {
    // Act & Assert.
    expect(
        fn () => Brainiac::array()
            ->min(2)
            ->parse(['foo'])
    )->toThrow(ShortArrayException::class);
});

it('should throw for too long arrays', function () {
    // Act & Assert.
    expect(
        fn () => Brainiac::array()
            ->max(1)
            ->parse(['foo', 'bar'])
    )->toThrow(LongArrayException::class);
});
