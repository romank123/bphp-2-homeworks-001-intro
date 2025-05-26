<?php

// Тестовые переменные для проверки
$testVariables = [
    3.14,      // float
    3,         // int
    'one',     // string
    true,      // bool
    null,      // null
    []         // array (other)
];

echo "=== Решение с if..elseif ===\n\n";

foreach ($testVariables as $index => $variable) {
    echo "Тест " . ($index + 1) . ": ";
    var_export($variable);
    echo " -> ";

    // Алгоритм определения типа с if..elseif
    if (is_bool($variable)) {
        $type = 'bool';
    } elseif (is_float($variable)) {
        $type = 'float';
    } elseif (is_int($variable)) {
        $type = 'int';
    } elseif (is_string($variable)) {
        $type = 'string';
    } elseif (is_null($variable)) {
        $type = 'null';
    } else {
        $type = 'other';
    }

    echo "type is $type\n";
}

echo "\n=== Решение с switch-case ===\n\n";

foreach ($testVariables as $index => $variable) {
    echo "Тест " . ($index + 1) . ": ";
    var_export($variable);
    echo " -> ";

    // Алгоритм определения типа с switch-case
    switch (true) {
        case is_bool($variable):
            $type = 'bool';
            break;
        case is_float($variable):
            $type = 'float';
            break;
        case is_int($variable):
            $type = 'int';
            break;
        case is_string($variable):
            $type = 'string';
            break;
        case is_null($variable):
            $type = 'null';
            break;
        default:
            $type = 'other';
    }

    echo "type is $type\n";
}

echo "\n=== Пример для одной переменной ===\n\n";

// Пример с одной переменной (как в задании)
$variable = 3.14;
// $variable = 3;
// $variable = 'one';
// $variable = true;
// $variable = null;
// $variable = [];

echo "Переменная: ";
var_export($variable);
echo "\n";

// Решение с if..elseif
if (is_bool($variable)) {
    $type = 'bool';
} elseif (is_float($variable)) {
    $type = 'float';
} elseif (is_int($variable)) {
    $type = 'int';
} elseif (is_string($variable)) {
    $type = 'string';
} elseif (is_null($variable)) {
    $type = 'null';
} else {
    $type = 'other';
}

echo "type is $type\n";

echo "\n=== Дополнительные тесты ===\n\n";

// Дополнительные тесты для типа "other"
$otherTests = [
    new stdClass(),        // object
    fopen('php://memory', 'r'),  // resource
    ['key' => 'value']     // array
];

foreach ($otherTests as $index => $testVar) {
    echo "Дополнительный тест " . ($index + 1) . ": ";

    if (is_resource($testVar)) {
        echo "resource";
    } elseif (is_object($testVar)) {
        echo "object";
    } elseif (is_array($testVar)) {
        echo "array";
    }

    echo " -> ";

    // Наш алгоритм
    if (is_bool($testVar)) {
        $type = 'bool';
    } elseif (is_float($testVar)) {
        $type = 'float';
    } elseif (is_int($testVar)) {
        $type = 'int';
    } elseif (is_string($testVar)) {
        $type = 'string';
    } elseif (is_null($testVar)) {
        $type = 'null';
    } else {
        $type = 'other';
    }

    echo "type is $type\n";
}

// Закрываем ресурс
if (isset($otherTests[1]) && is_resource($otherTests[1])) {
    fclose($otherTests[1]);
}

?>