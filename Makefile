ifeq ("$(wildcard $(Docker/.env))","")
    -include Docker/.env
    export $(shell sed 's/=.*//' Docker/.env)
endif

PROJECT_NAME = laravel_test
COMPOSER_VERSION = 2.2.1
PHP_VERSION = 8.2

RUNUP 	= --force-recreate
RUNUPD 	= --force-recreate -d
CDDK 	= cd Docker


help:
	@echo ''
	@echo 'Uso de la aplicación: make [OBJETIVO]'
	@echo '****************************************************************'
	@echo ''
	@echo 'OBJETIVOS:'
	@echo ''
	@echo '  -enviroment		Crea el enviroment de docker con lo necesario para funcionar'
	@echo '  -install  		Instala la aplicación => se descarga los componentes necesarios e instala el enviroment'
	@echo '  -build    		Construye el contenedor de la aplicación'
	@echo '  -up    		Levanta la aplicación y mantiene el stderr en la consola actual'
	@echo '  -up-d    		Levanta la aplicación y deja libre la consola'
	@echo '  -exec    		Entra en el contenedor maestro (el que usaremos para el desarrollo)'
	@echo '  -nginx-exec    	Entra en el contenedor de nginx'
	@echo '  -rebuild    		Reconstruye el build de los contenedores'
	@echo '  -stop    		Detiene todos los contenedores activos'
	@echo ''
	@echo '****************************************************************'

enviroment:
	 export PROJECT_NAME=${PROJECT_NAME} && \
 	 export COMPOSER_VERSION=${COMPOSER_VERSION} && \
 	 export PHP_VERSION=${PHP_VERSION} && \
 	 sh install.sh

install: enviroment

build:
	$(CDDK) && docker-compose build

up:
	$(CDDK) && docker-compose up $(RUNUP)

up-d:
	$(CDDK) && docker-compose up $(RUNUPD)

exec:
	$(CDDK) && docker exec -ti $(PHPCONTAINER) /bin/sh

nginx-exec:
	$(CDDK) && docker exec -ti $(NGINXCONTAINER) /bin/bash

stop:
	$(CDDK) && docker-compose stop

rebuild:
	docker-compose build --no-cache
