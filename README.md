COMPOSER TESTS
==============

Collection of Php `Composer` tool tests.


### Custo Package Type

if I set `"type": "simosca-data"` inside one or more package (i.e. `testtypeone` and `testtypetwo`) 
and I enable plugin to perform action with this type (`plugintype`),
then I can perzonalize default `composer` behaviour, like change destination folder:
in this example is `storage/simosca-datapackage/<vendor>/<package>`.

See  `SimoSca\PluginType\Composer\DataInstaller`.


**Refs**

- [https://getcomposer.org/doc/articles/plugins.md](https://getcomposer.org/doc/articles/plugins.md)

- [https://carlosbuenosvinos.com/working-at-the-same-time-in-a-project-and-its-dependencies-composer-and-path-type-repository/](https://carlosbuenosvinos.com/working-at-the-same-time-in-a-project-and-its-dependencies-composer-and-path-type-repository/)

- [https://getcomposer.org/doc/articles/custom-installers.md](https://getcomposer.org/doc/articles/custom-installers.md)

