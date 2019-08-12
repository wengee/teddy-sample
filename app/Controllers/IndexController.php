<?php
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-08-12 14:39:05 +0800
 */

namespace App\Controllers;

use Teddy\Controller;
use App\Http\Request;
use App\Http\Response;

class IndexController extends Controller
{
    public function index(Request $request, Response $response)
    {
        return $response->json(0);
    }
}
