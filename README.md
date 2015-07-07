# The Lens Pattern

This is my very naive interpretation of the Lens Pattern (again, as I understand it).

I'm intending it to be used in the following way:
```php
$order = [
  'details' => [...],
  'purchaser' => [
    'name' => ['first' => 'Bob', 'last' => 'Loblaw']
  ]
];
$brokenOrder = [ 'details' => null, 'purchaser' => null ];

// The lens will try to access the properties specified on an object, 
// or use the default value given
$firstNameLens = new Lens(['purchaser', 'name', 'first'], "Unknown");

$firstNameLens->get( $order );       //=> "Bob"
$firstNameLens->get( $brokenOrder ); //=> "Unknown"
```
