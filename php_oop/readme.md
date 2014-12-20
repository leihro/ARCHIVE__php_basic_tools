concepts about PHP oop

1. class, obj, property, method, new instance
2. visibility scope: public, private, protected
3. magic methods: __get, __set, __construct, __toString, __clone, __autoload...
4. static, self, $this, ::, parent, const
5. multi classes: extends, abstract(limit class access), interface(what is needed instead of how), final, clone, reference
6. structure:
	--interface Model
	--abstract class Address implements Model
		--class AddressBusiness extends Address
		--class AddressPark extends Address
		--class AddressResidence extends Address
	--Demos