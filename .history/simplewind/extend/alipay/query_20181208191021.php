<?php

namespace alipay;

use think\Loader;

Loader::import('alipay.pagepay.service.AlipayTradeService');
loader::import('alipay.pagepay.buildermodel.AlipayTradeQueryContentBuilder');

/**
 * 统一收单线下交易查询接口
 *
 * 用法:
 * 调用 \alipay\Query::exec($query_no) 即可
 *
 * ----------------- 求职 ------------------
 * 姓名: zhangchaojie      邮箱: zhangchaojie_php@qq.com  应届生
 * 期望职位: PHP初级工程师   地点: 深圳(其他城市亦可)
 * 能力:
 *     1.熟悉小程序开发, 前后端皆可
 *     2.后端, PHP基础知识扎实, 熟悉ThinkPHP5框架, 用TP5做过CMS, 商城, API接口
 *     3.MySQL, Linux都在进行进一步学习
 *
 */
class Query
{
    public function exec($out_trade_no)
    {
        $RequestBuilder = new AlipayTradeQueryContentBuilder();
        $RequestBuilder->setOutTradeNo($out_trade_no);
        //$RequestBuilder->setTradeNo($trade_no);

        $aop = new AlipayTradeService($config);

        /**
         * alipay.trade.query (统一收单线下交易查询)
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @return $response 支付宝返回的信息
         */
        $response = $aop->Query($RequestBuilder);
        var_dump($response);
    }
}
