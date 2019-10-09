<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:51:44 +0800
 */

namespace App\Models;

use Teddy\Model\Model;

abstract class ModelBase extends Model
{
    public function save(bool $quiet = true): bool
    {
        $ret = parent::save($quiet);
        $this->trigger('afterSaveOrDelete');
        return $ret;
    }

    public function delete(bool $quiet = true): bool
    {
        $ret = parent::delete($quiet);
        $this->trigger('afterSaveOrDelete');
        return $ret;
    }
}
