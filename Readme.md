# Technical test Phalcon 4
### Sergio Santiago Henares
Aplicación como prueba técnica con el framework Phalcon 4.<br>

Esta consta de 4 endpoints:
* `http://localhost:8080` Imprime una plantilla con un índice hacia los demás endpoints
* `http://localhost:8080/http-provider` Devuelve un JSON con información mergeada obtenida desde otros 2 endpoint externos
* `http://localhost:8080/mysql-provider` Devuelve un JSON con información de las entidades requeridas relacionadas entre si
* `http://localhost:8080/elasticsearch-provider` Devuelve un JSON con la información almacenada en ES agregada por indices (entidades en este caso)

El modelo de arquitectura propuesta en un modelo MVC propio del framework.<br>
Se ha barajado un modelo más simple con una aplicación de tipo micro pero dada la diversidad de funciones se ha optado por una simple.<br>

El código principal se ha separado en 3 controladores, cada uno de ellos dedicado a servir a un endpoint distinto desde las diferentes fuentes.<br>
* `application/app/controllers/HttpProviderController.php`
* `application/app/controllers/MySqlProviderController.php`
* `application/app/controllers/ElasticSearchProviderController.php`

Para la comunicación a traves del protocolo HTTP se ha incluido un cliente de dicho protocolo cargado a traves de un namespace.<br>
* `application/app/library/Http`

Hay generada una migración para aprovisionar la BBDD con las tablas necesarias.<br>
* `application/app/migrations/1.0.0/init_tables.php`

Y las entidades con los modelos de BDDD, relacionados entre si.<br>
* `application/app/models/Company.php`
* `application/app/models/CompanySecurity.php`
* `application/app/models/Security.php`

Se ha modificado la plantilla por defecto para mostrar un índice del resto del servicio.<br>
* `application/app/views/index.phtml`

Además se han dockerizado todos los servicios necesarios para que la aplicación pueda funcionar y se incluyen todas las instrucciones para aprovisionar con datos de prueba el servicio.<br>
Los scripts de aprovisionamiento y los volúmenes para almacenar información de forma persistente se encuentran en `.docker`<br>

El punto fuerte del servicio es que ha sido creado desde la perspectiva de que pueda ser dimensionado sin convertirse en algo inmanejable.<br>
Por ejemplo si se requiriesen nuevos endpoints, nuevos campos...etc para el http-provider o si fuese necesario implementar un servicio más completo a mysql-provider o elasticsearch-provider, un CRUD por ejemplo.<br>

El punto debil del servicio es la poca extracción de funcionalidad que podría ser común más adelante en servicios fuera de los controladores y el uso del cliente HTTP para la comunicación con ElasticSearch en vez de utilizar una librería para dicho propósito. 

### Commands to up first time
For up the project run the next commands:

Up docker services
* `docker-compose up -d` Allow a couple of minutes while everything is getting up 

Install composer dependencies
* `docker-compose exec app composer install` 

Run migration for create tables with model in database
* `docker-compose exec app ./vendor/bin/phalcon migration run` 

Import some test data to database
* `docker-compose exec mysql /bin/sh -c "mysql -uroot -proot technical_test_phalcon_app < /scripts/insert_test_data.sql"` 

Run script to post some test data into elasticsearch
* `docker-compose exec elasticsearch /bin/sh -c "sh /scripts/insert_test_data.sh"` 

### Help commands for DEV
More used commands for development:

Enter database
* `docker-compose exec mysql mysql -uroot -proot technical_test_phalcon_app` 

Show elasticsearch indexes
* `docker-compose exec elasticsearch /bin/sh -c "curl -XGET -u \"elastic:changeme\" -H \"Content-Type: application/json\" \"http://localhost:9200/_cat/indices?v\""` 

