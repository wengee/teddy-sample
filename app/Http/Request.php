<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2021-05-08 16:15:14 +0800
 */

namespace App\Http;

use Teddy\Http\Request as TeddyRequest;

class Request extends TeddyRequest
{
    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    public function validate($validation, array $fields = [])
    {
        return $this->validateParsedBody($validation, $fields);
    }

    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    public function validateQuery($validation, array $fields = [])
    {
        $postData = (array) $this->getQueryParams();

        return validate($validation, $postData, $fields);
    }

    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    public function checkQuery($validation, array $fields = [])
    {
        $postData = (array) $this->getQueryParams();

        return validate($validation, $postData, $fields, true);
    }

    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    public function validateParsedBody($validation, array $fields = [])
    {
        $postData = (array) $this->getParsedBody();

        return validate($validation, $postData, $fields);
    }

    /**
     * @param string|Teddy\Validation\Validation $validation
     * @param Teddy\Validation\Field[]           $fields
     */
    public function checkParsedBody($validation, array $fields = [])
    {
        $postData = (array) $this->getParsedBody();

        return validate($validation, $postData, $fields, true);
    }

    public function getPageInfo(int $pageSize = 0): array
    {
        $currentPage = max(1, (int) $this->getParam('page', 1));
        if (0 === $pageSize) {
            $pageSize = (int) $this->getParam('pageSize', 0);
            if ($pageSize <= 0 || $pageSize > 100 || !in_array($pageSize, [10, 20, 50, 100])) {
                $pageSize = 20;
            }
        }

        return [$currentPage, $pageSize];
    }
}
