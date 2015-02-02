# Design Patterns
常用的Design Pattern在PHP的实现原理，特征和可能的用途，参考[project of domnikl](https://github.com/domnikl/DesignPatternsPHP). 通过学习灵活掌握并留下文档纪录
### Creational 

* [Singleton](https://github.com/leihro/php_basic_tools/tree/master/design_pattern/src/Creational/Singleton): 单例的类只能创建**“一个”**实例
* [Factory](https://github.com/leihro/php_basic_tools/tree/master/design_pattern/src/Creational/Factory): 用户通过工厂提供的接口**“创建”**特定类的**实例**，生产的过程由工厂封装在相应的类中
* AbstractFactory
* StaticFactory
* FactoryMethod
* Builder
* Multiton
* Pool
* Prototype

### Structural

* [DependencyInjection](https://github.com/leihro/php_basic_tools/tree/master/design_pattern/src/Structural/DependencyInjection): **“解耦合”**，类实现的依赖来自其他类的控制，实现Inverse of Controll原则
* Adapter
* Bridge
* Composite
* DataMapper
* Decorator
* Facade
* FluentInterface
* Proxy
* Registry

###Behavioral

* [Strategy](https://github.com/leihro/php_basic_tools/tree/master/design_pattern/src/Behavioral/Strategy): 用户通过统一接口进行**“策略选择”**，策略的实现内部自动实现
* ChainOfResponsibilities
* Command
* Iterator: 通过实现**Iterator接口定义的methods**，可以让object具有可遍历的性质
* Mediator
* Memento: 记事本，**纪录上一个状态**，并且可以根据需要还原
* NullObject: 和普通class一样实现一个接口，实现的method不做任何事，简化代码逻辑，**省去is_null()**检验，因为已经在Object层面定义了Null的行为
* Observer: 通过**SplSubject, SplObserver**实现。subject定义attach和detach Observer 行为，当subject的obj更改时notify Observer，observer实现update，
* Specification
* State
* TemplateMethod: 抽象类**定义好Template**，尽量不让user改。具体的类实现抽象类中的抽象method，从而实现Template
* Visitor

###Others

* Delegation
* ServiceLocator
* Repository

For testing, go to root directory using 
```
phpunit --bootstrap ./vendor/autolaod.php test/
```