<?php
/**
 * This file is part of Notadd.
 *
 * @author        TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime      2017-05-23 17:07
 */
namespace Notadd\Mall\Handlers\Seller\Store;

use Illuminate\Validation\Rule;
use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Mall\Models\Store;

/**
 * Class StoreHandler.
 */
class StoreHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->validate($this->request, [
            'id' => [
                Rule::exists('mall_store_suppliers'),
                'numeric',
                'required',
            ],
        ], [
            'id.exists'   => '没有对应的店铺信息',
            'id.numeric'  => '店铺 ID 必须为数值',
            'id.required' => '店铺 ID 必须填写',
        ]);
        $store = Store::query()->find($this->request->input('id'));
        if ($store instanceof Store) {
            $this->withCode(200)->withData($store)->withMessage('获取店铺信息成功！');
        } else {
            $this->withCode(500)->withError('没有对应的店铺信息！');
        }
    }
}
