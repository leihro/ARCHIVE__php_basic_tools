# Dependency Injection 依赖注入 
原理：最大程度的解耦合，app函数的配置不依赖app本身，而来自外部config类，至于config如何实现无所谓，只要接口保证
好处：testable, maintainable, extendable