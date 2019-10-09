<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:48:52 +0800
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
