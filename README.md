# dumpedie [![Build Status](https://travis-ci.org/SenseException/dumpedie.svg?branch=master)](https://travis-ci.org/SenseException/dumpedie)

Another var_dump like debugging function with special debugging features.

## Once upon a time, there was var_dump ...

and var_dump was our biggest help when it came to debug code. Today, we have debugger
in our IDEs that covers nearly every need of a PHP developer, but every now and then,
we still need to go back to our var_dump beginnings. This is where dumpedie can be
of help.

## An alternative var_dump

dumpedie is an alternative to PHP's build-in var_dump to debug code when
no IDE with a debugger is available. It uses Symfony's VarDumper component in
its core to highlight and format the output. You only have to use the function
like you already know from var_dump:

```php
dumpedie($var1, $var2, $object);
```

In addition, dumpedie offers some small nifty features.

### Conditions

Only output the followed content in dumpedie when a condition set with `dd_cond()` was met.

```php
dumpedie($var1, dd_cond('foo' === $value), $var2);
```

This always shows the content of `$var1`, but it only shows the content of `$var2`
if the variable `$value` is `foo`.

### Trace

Sometimes you want to know the whole trace from where your code was called from.
`dd_trace()` shows a trace like you know from exceptions and offers you insight to
the method's calls.

```php
dumpedie(dd_trace());
```