# psr-4 autoload
a basic project scaffold with psr-4 autoload setting up, under namespace of 
`BundleName` and from directory `'/src'`. this should be configured in `composer.json` `autoload` for testing go to root directory using 
```
phpunit --bootstrap ./vendor/autolaod.php test/
```