# PHP CommerceML
Simple and requirements-free SimpleXML-based CommerceML parser and builder.

## Features

Usage: 
   
     composer require arsengoian/commerce-ml
   
Parse CommerceML:

```php
use CommerceML\Client;
/**
 * @var string $input
 */
$commercialInformation = Client::toCommerceML($input);
```     
    
Build CommerceML string from CommerceML object:

```php
use CommerceML\Client;
/**
 * @var CommerceML\Implementation\CommercialInformation $commercialInformation
 */
$output = Client::toString($commercialInformation);
```   

Namespaces:
- `CommerceML\Nodes` - abstract classes representing nodes. May have a custom implementation, including database storage
- `CommerceML\Implementation` - simplest implementations storing variables in protected fields. This implementation will be returned while parsing. Nodes collecting arrays also implement `ArrayAccess`, `IteratorAggregate` and `Countable`.
- `CommerceML\Constructors` - implementations with constructors, extend those from `CommerceML\Implementation`. Use these while building a custom CommerceML tree.


## Advanced:

To use custom classes while parsing, before calling `Client::toString()`, do:

```php
use CommerceML\Node\Node

Node::overrideImplementations([
    ProductCustomImplementation::class, // Must inherit from CommerceML\Implementations\Product
]);

```


## Contributions
Current implementation of the library doesn't cover all possible CommerceML nodes.
E.g. product import nodes aren't covered.

Also complete test coverage would be welcomed.
