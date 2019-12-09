COMPOSER TESTS
==============

Collection of Php `Composer` tool tests.

### Usage

````bash
docker-compose up -d
docker-compose exec webserver bash
````

inside container

````bash
./composer.phar update
````

and test plugin custom command

````bash
./composer.phar my-plugin-command
````

### XDEBUG

Better command to run the project with xdebug (from inside container):

````
bash testcomposer.sh ...
````

### Custom Package Type

if I set `"type": "simosca-data"` inside one or more package (i.e. `testtypeone` and `testtypetwo`) 
and I enable plugin to perform action with this type (`plugintype`),
then I can perzonalize default `composer` behaviour, like change destination folder:
in this example is `storage/simosca-datapackage/<vendor>/<package>`.

See  `SimoSca\PluginType\Composer\DataInstaller`.


**Refs**

- [https://getcomposer.org/doc/articles/plugins.md](https://getcomposer.org/doc/articles/plugins.md)

- [https://carlosbuenosvinos.com/working-at-the-same-time-in-a-project-and-its-dependencies-composer-and-path-type-repository/](https://carlosbuenosvinos.com/working-at-the-same-time-in-a-project-and-its-dependencies-composer-and-path-type-repository/)

- [https://getcomposer.org/doc/articles/custom-installers.md](https://getcomposer.org/doc/articles/custom-installers.md)


GENERIC REFS
------------

Good repository examples:

- [https://github.com/naderman/composer-aws/blob/master/composer.json](https://github.com/naderman/composer-aws/blob/master/composer.json)
 with scome [composer explanation](https://getcomposer.org/doc/articles/plugins.md)
 
### VERY GOOD

very good collection of composer articles/repositories/examples:

- [https://github.com/jakoch/awesome-composer/blob/master/README.md](https://github.com/jakoch/awesome-composer/blob/master/README.md)