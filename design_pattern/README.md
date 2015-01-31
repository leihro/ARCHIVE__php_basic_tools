# Design Patterns
常用的Design Pattern在PHP的实现原理，特征和可能的用途，参考[project of domnikl](https://github.com/domnikl/DesignPatternsPHP). 通过学习灵活掌握并留下文档纪录
### Creational 

* Factory: 用户通过工厂提供的接口*创建*特定类的实例，生产的过程由工厂封装在相应的类中
* Singleton: 单例的类只能创建*一个*实例

### Structural

* DependencyInjection: *解耦合*，类实现的依赖来自其他类的控制，实现Inverse of Controll原则

###Behavioral

* Strategy: 用户通过统一接口进行*策略选择*，策略的实现内部自动实现

###Others

For testing, go to root directory using 
```
phpunit --bootstrap ./vendor/autolaod.php test/
```