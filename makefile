.PHONY: up
up:
	docker compose up -d

.PHONY: down
down:
	docker compose down

.PHONY: permissions
permissions:
	sudo chown -R a: php/html/config
	sudo chown -R a: php/html/resources
	sudo chown -R a: php/html/src
	sudo chown -R a: php/html/templates
	sudo chown -R a: php/html/tests
	sudo chown -R a: php/html/webroot

.PHONY: migrations
migrations:
	docker compose exec php bin/cake migrations migrate

.PHONY: bake
bake:
	docker compose exec php bin/cake bake all -f Services
	docker compose exec php bin/cake bake all -f Clinics
	docker compose exec php bin/cake bake all -f ServiceItems
	docker compose exec php bin/cake bake all -f ClinicServices
	docker compose exec php bin/cake bake all -f ClinicServiceItems
	docker compose exec php bin/cake bake all -f ClinicServiceItemPeriods
	docker compose exec php bin/cake cache clear_all
	make permissions

.PHONY: i18n
i18n:
	docker compose exec php bin/cake i18n extract --overwrite --extract-core no
	docker compose exec php bin/cake cache clear_all
	sudo chown -R a: php/html/resources/locales

.PHONY: restore
restore:
	sudo rm -rf postgres