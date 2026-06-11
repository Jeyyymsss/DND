<?php
$r = new ReflectionMethod('DatePeriod', 'getIterator');
$t = $r->getReturnType();
if ($t) {
    echo $t->getName();
} else {
    echo 'none';
}
