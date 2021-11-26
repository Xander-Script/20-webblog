#!/bin/bash
export PATH="$HOME/.asdf/shims:$PATH"
PHP_CS_FIXER_IGNORE_ENV=true ./vendor/bin/php-cs-fixer "$@"
