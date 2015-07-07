# The Lens Pattern

This is my very naive interpretation of the Lens Pattern (again, as I understand it).

I'm intending it to be used in the following way:
```php
$order = [
  'details' => [...],
  'purchaser' => [
    'name' => ['first' => 'Bob', 'last' => 'Loblaw']
  ];
];
$brokenOrder = [];
$getFirstName = new Lens(['purchaser', 'name', 'first'], "Unknown");

$getFirstName->get( $order );       //=> "Bob"
$getFirstName->get( $brokenOrder ); //=> "Unknown"
```
