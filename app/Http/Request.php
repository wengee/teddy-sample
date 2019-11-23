<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-11-23 10:24:16 +0800
 */

namespace App\Http;

use Teddy\Http\Request as TeddyRequest;

class Request extends TeddyRequest
{
    public function validate($validation, array $rules = [])
    {
        return $this->validateParsedBody($validation, $rules);
    }

    public function validateParsedBody($validation, array $rules = [])
    {
        $postData = (array) $this->getParsedBody();
        return validate($validation, $postData, $rules);
    }

    public function checkParsedBody($validation, array $rules = [])
    {
        $postData = (array) $this->getParsedBody();
        return validate($validation, $postData, $rules, true);
    }

    public function getPageInfo(int $pageSize = 0): array
    {
        $currentPage = max(1, (int) $this->getParam('page', 1));
        if ($pageSize === 0) {
            $pageSize = (int) $this->getParam('pageSize', 0);
            if ($pageSize <= 0 || $pageSize > 100 || !in_array($pageSize, [10, 20, 50, 100])) {
                $pageSize = 20;
            }
        }

        return [$currentPage, $pageSize];
    }
}
