# PHP Lint Example Project

## Background

This repo was created to demonstrate issues I am facing with the [GitHub Super-Linter](https://github.com/github/super-linter)
running [Psalm](https://psalm.dev/) to detect bugs in PHP code.

This code runs on PHP 7.4 

## Development

To install all the dependencies, you must have [Composer](https://getcomposer.org/) installed
and then run `php composer.phar install` (or `composer install`).

## Testing

I am using [Codeception](https://codeception.com/docs/05-UnitTests) for unit tests.

Run tests with `php vendor/bin/codecept run`.

## Lint

We use [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) to detect PHP violations
and coding standard violations. The `phpcs` command detects violations:

```shell
./vendor/bin/phpcs --standard=.github/linters/phpcs.xml restServer/
```

and `phpcbf` automatically corrects the violations:

```shell
./vendor/bin/phpcbf --standard=.github/linters/phpcs.xml restServer/
```

We also use [PHPStan](https://phpstan.org/) to find bugs:

```shell
./vendor/bin/phpstan analyse \
    --configuration .github/linters/phpstan.neon
```

And we also use [Psalm][https://psalm.dev/] to detect bugs too:

```shell
./vendor/bin/psalm -c .github/linters/psalm.xml
```

These tools are all also used by the GitHub SuperLinter. To make sure we have the same versions of the tools,
compare the `composer.json` file in this repo to the [`dependencies/phive.xml`](https://github.com/github/super-linter/blob/7c321102dd1c65adf0c872c3632fa8367e8bee0e/dependencies/phive.xml)
file in the super-linter repo.
