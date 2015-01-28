# psr-4 autoload
a basic project scaffold with psr-4 autoload setting up, projects codes should under namespace of `BundleName` and from directory `'/src'`. This can be configured in `composer.json` `autoload` 
For testing, go to root directory using 
```
phpunit --bootstrap ./vendor/autolaod.php test/
``