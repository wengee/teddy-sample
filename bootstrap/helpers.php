<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:23:10 +0800
 */

if (!function_exists('validate')) {
    function validate($validation, array $data, array $rules = [], bool $quiet = false)
    {
        static $instances = [];
        if ($validation instanceof Teddy\Validation\Validation) {
            return $validation->validate($data, $rules, $quiet);
        }

        $validation = strval($validation);
        if (!isset($instances[$validation])) {
            if (strpos($validation, '.') !== false) {
                $className = str_replace(' ', '\\', ucwords(str_replace('.', ' ', $validation)));
            } else {
                $className = ucfirst($validation);
            }

            $className = '\\App\\Validations\\' . $className;
            if (!class_exists($className)) {
                throw new RuntimeException('Validation [' . $className . '] is not defined.');
            }

            $instance = $className::instance();
            $instances[$validation] = $instance;
        } else {
            $instance = $instances[$validation];
        }

        return $instance->validate($data, $rules, $quiet);
    }
}
