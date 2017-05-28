<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-05-05 20:39
 */
namespace Notadd\Mall\Handlers\Admin\Product\Specification;

use Notadd\Foundation\Passport\Abstracts\Handler;
use Notadd\Mall\Models\ProductSpecification;

/**
 * Class ListHandler.
 */
class ListHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $builder = ProductSpecification::query();
        $this->withCode(200)->withData($builder->get())->withMessage('');
    }
}
