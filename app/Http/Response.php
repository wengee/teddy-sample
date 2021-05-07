<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-05-07 16:38:29 +0800
 */

namespace App\Http;

use Teddy\Http\Response as TeddyResponse;

class Response extends TeddyResponse
{
    public function render(string $path, array $data = [])
    {
        $html = app('renderer')->render($path, $data);

        return $this->withStatus(200)->write($html);
    }
}
