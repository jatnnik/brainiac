<?php

use Jatnnik\Brainiac\Brainiac;
use Jatnnik\Brainiac\Exceptions\InvalidStringException;
use Jatnnik\Brainiac\Exceptions\LiteralStringException;
use Jatnnik\Brainiac\Exceptions\LongStringException;
use Jatnnik\Brainiac\Exceptions\ShortStringException;

it('should parse strings', function () {
    // Act.
    $result = Brainiac::string()->parse('hello');

    // Assert.
    expect($result)->toEqual('hello');
});

it('should throw for non strings', function () {
    // Act & Assert.
    expect(fn () => Brainiac::string()->parse(123))->toThrow(
        InvalidStringException::class
    );

    expect(fn () => Brainiac::string()->parse(true))->toThrow(
        InvalidStringException::class
    );
});

it('should validate string length', function () {
    // Act & Assert.
    expect(fn () => Brainiac::string()->min(1)->parse(''))->toThrow(
        ShortStringException::class
    );

    expect(fn () => Brainiac::string()->max(3)->parse('test'))->toThrow(
        LongStringException::class
    );

    expect(Brainiac::string()->min(1)->max(10)->parse('test'))->toEqual('test');
});

it('should not throw when using safe_parse', function () {
    // Act & Assert.
    expect(fn () => Brainiac::string()->parse('foo'))
        ->not()
        ->toThrow(InvalidStringException::class);
});

it('should validate literal strings', function () {
    // Act & Assert.
    expect(fn () => Brainiac::string()->literal('foo')->parse('bar'))->toThrow(LiteralStringException::class);

    expect(fn () => Brainiac::string()->literal('foo')->parse('foo'))
        ->not()
        ->toThrow(LiteralStringException::class);
});
