<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-05-08 16:15:24 +0800
 */

if (!function_exists('validate')) {
    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    function validate($validation, array $data, array $fields = [], bool $safe = false)
    {
        static $instances = [];
        if ($validation instanceof Teddy\Validation\Validation) {
            return $validation->validate($data, $fields, $safe);
        }

        $validation = strval($validation);
        if (!isset($instances[$validation])) {
            if (false !== strpos($validation, '.')) {
                $className = str_replace(' ', '\\', ucwords(str_replace('.', ' ', $validation)));
            } else {
                $className = ucfirst($validation);
            }

            $className = '\\App\\Validations\\'.$className;
            if (!class_exists($className)) {
                throw new RuntimeException('Validation ['.$className.'] is not defined.');
            }

            $instances[$validation] = new $className();
        }

        $instance = $instances[$validation];

        return $instance->validate($data, $fields, $safe);
    }
}

if (!function_exists('dec2any')) {
    function dec2any(int $num, $base = 62): string
    {
        if (is_string($base)) {
            $index = $base;
            $base  = strlen($index);
        } else {
            $base  = (int) $base;
            $index = substr('l2Vj5aUOBCLpdFRsK6ytAXzGbY1QWewvHhxE4gT38SPqmfioc7Ju9NDr0IZMkn', 0, $base);
        }

        $out = '';
        for ($t = floor(log10($num) / log10($base)); $t >= 0; --$t) {
            $a   = intval(floor($num / $base ** $t));
            $out = $out.substr($index, $a, 1);
            $num = $num - ($a * $base ** $t);
        }

        return $out;
    }
}

if (!function_exists('any2dec')) {
    function any2dec(string $num, $base = 62): int
    {
        if (is_string($base)) {
            $index = $base;
            $base  = strlen($index);
        } else {
            $base  = (int) $base;
            $index = substr('l2Vj5aUOBCLpdFRsK6ytAXzGbY1QWewvHhxE4gT38SPqmfioc7Ju9NDr0IZMkn', 0, $base);
        }

        $out = 0;
        $len = strlen($num) - 1;
        for ($t = 0; $t <= $len; ++$t) {
            $out = $out + strpos($index, substr($num, $t, 1)) * $base ** ($len - $t);
        }

        return (int) $out;
    }
}
