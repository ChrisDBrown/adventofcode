.PHONY: all
default: all;

unit:
	bin/phpunit src/

stan:
	vendor/bin/phpstan analyse -l max src/

all: unit stan