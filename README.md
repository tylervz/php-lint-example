# PHP Lint Example Project

## Background

This repo was created to demonstrate the issue I am facing with the [GitHub Super-Linter](https://github.com/github/super-linter)
running [Psalm](https://psalm.dev/) to detect bugs in PHP code.

This code runs on PHP 7.4

## Psalm Issue

As demonstrated in [this run of the Super-Linter](https://github.com/tylervz/php-lint-example/runs/3487479266?check_suite_focus=true),
Psalm outputs an error for each PHP file it checks:

```text
2021-09-01 17:44:35 [INFO]   File:[/github/workspace/restServer/Server.php]
2021-09-01 17:44:35 [ERROR]   Found errors in [psalm] linter!
2021-09-01 17:44:35 [ERROR]   Error code: 1. Command output:
------
Could not find any composer autoloaders in /github/workspace/
Add a --root=[your/project/directory] flag to specify a particular project to run Psalm on.
```

`phpstan` also outputs an error (`Reflection error: Codeception\Test\Unit not found.`),
but this is not too bad since `phpstan` still runs and can highlight corrections that need to be made
in `ServerTest.php` and any other Codeception unit test.

When running locally on my machine using the commands described below, all of the linters run without an error.

## Development

To install all the dependencies, you must have [Composer](https://getcomposer.org/) installed
and then run `php composer.phar install` (or `composer install`).

## Testing

I am using [Codeception](https://codeception.com/docs/05-UnitTests) for unit tests.

Run tests with `php vendor/bin/codecept run` in the root directory of this repo.

## Lint

Note: all these commands are run in the root directory of this repo.

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

And we also use [Psalm](https://psalm.dev/) to detect bugs too:

```shell
./vendor/bin/psalm -c .github/linters/psalm.xml
```

These tools are all used by the GitHub SuperLinter.
At the time of writing, they are using approximately the same versions;
you can compare the `composer.json` file in this repo to the [`dependencies/phive.xml`](https://github.com/github/super-linter/blob/7c321102dd1c65adf0c872c3632fa8367e8bee0e/dependencies/phive.xml)
file in the super-linter repo.
