<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:47:11 +0800
 */

use Slim\Psr7\Factory\UriFactory;

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

if (!function_exists('build_url')) {
    function build_url(string $url, array $queryArgs = []): string
    {
        static $uriFactory;
        if (!isset($uriFactory)) {
            $uriFactory = new UriFactory;
        }

        if (!$queryArgs) {
            return $url;
        }

        $uri = $uriFactory->createUri($url);
        $query = $uri->getQuery();
        $query .= ($query ? '&' : '') . http_build_query($queryArgs);
        $uri = $uri->withQuery($query);

        return (string) $uri;
    }
}
