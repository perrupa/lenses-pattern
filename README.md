# The Lens Pattern

This is my very naive interpretation of the Lens Pattern (...as I understand it).

I'm intending it to be used in the following way; to avoid value checking to avoid `NullReferenceErrors` and provide default values when the expected value does not exist.

```php
// object w/ nested attributes
$order = [
  'details' => [...],
  'purchaser' => [
    'name' => ['first' => 'Bob', 'last' => 'Loblaw']
  ]
];
// object w/ some null attributes
$brokenOrder = [ 'details' => null, 'purchaser' => null ];

// The lens will try to access the properties specified on an object, 
// or use the default value given
$firstNameLens = new Lens(['purchaser', 'name', 'first'], "Unknown");

$firstNameLens->get( $order );       //=> "Bob"
$firstNameLens->get( $brokenOrder ); //=> "Unknown"
```

## Straw man argument

Compare the following:
`$lens = new Lens(['purchaser', 'name', 'first'], "default");`
vs
```
if( array_key_exists( "puchaser", $obj ) 
    && array_key_exists( "name", $obj['puchaser'] ) 
    && array_key_exists( "first", $obj['puchaser']['name'] ) 
    && !empty( $obj['puchaser']['name']['first'] ) ) {
  $value = $obj['puchaser']['name']['first'];
} else {
  $value = "default";
}
```
