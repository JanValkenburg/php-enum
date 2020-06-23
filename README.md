
# Enum
This Enum class is a validation method to check if the given
value is in the accepted list if not then the value will be 
an empty string, or an exception will be thrown. With this 
class you can be sure no unwanted values are accepted. For 
now this class only works with strings.
 
## Class synopsis

```
class Enum
{
    /* constants */
    const MODE_STRICT = 'strict';
    const MODE_LOOSE = 'loose';

    /* Methods */
    public __construct(array $accepts, [string $mode = self::MODE_STRICT])
    public set(string $value)
    public get(void):string
}
```

## Usage

MODE_STRICT will throw an error when the value not accepted.
MODE_LOOSE will return an empty string when the value not accepted.

```
new Enum(array $accepts, [Enum::MODE_LOOSE|Enum::MODE_STRICT $mode])
```

```
$enum = new Enum(['a', 'b']);
$enum->set('a');
echo $enum; // a
```
License
-------
MIT, see LICENSE.