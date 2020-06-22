.PHONY: install serve

install:
	composer install

serve:
	php -S localhost:8000 -t ./src
