<?php

use Jannbar\Brainiac\Brainiac;
use Jannbar\Brainiac\Exceptions\InvalidBooleanException;

it('should parse booleans', function () {
    // Act & Assert.
    expect(Brainiac::boolean()->parse(true))->toEqual(true);
    expect(Brainiac::boolean()->parse(false))->toEqual(false);
});

it('should throw for non booleans', function () {
    // Act & Assert.
    expect(fn () => Brainiac::boolean()->parse('true'))->toThrow(
        InvalidBooleanException::class
    );
});

it('should not throw when using safe_parse', function () {
    // Act & Assert.
    expect(fn () => Brainiac::boolean()->safe_parse('true'))
        ->not()
        ->toThrow(InvalidBooleanException::class);
});
