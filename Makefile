#
#	makefile to automize laravel operations
#
SRV_PATH=/var/www/html

.PHONY: perms

perms:
	chmod 777 -R $(SRV_PATH)
	chown 1000:1000 -R $(SRV_PATH)

opt: perms
	php artisan optimize

deep_clear: perms
	php artisan optimize:clear
