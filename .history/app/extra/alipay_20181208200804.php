<?php

/**
 * 支付宝支付
 */

return [
        //应用ID,您的APPID。
    'app_id' => "2016092300577513",

        //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEpQIBAAKCAQEAslzpx68NzBayUHb5gcYEPLGu9Ms64n8wYuQf3P9d+ONwGBpnE6ObX1oL1w7Md3D+fQ6kNcbhi7lNa/fJ+++1bwEhENB8ZSHfXdykBS5Mf/52X7wzFhbpEyk/m07wr1fw5Vp0GYQxLszUnHNqfP7jcReHqosjcKhyuszDvxObl2Nvpu4n6IJCMrYAkjxLMrCOYo9RZ8Cv14mPgpFVGvMkuULpUCpClH5njfkhJkHHQved0KQ+Pvo56YSL/sJBCR4NHQwYFED1Om0tZkAJIEuZDgJYd82zoifVNeFdqX1HG6YCx2EW1EjRDI6W3u7SZcB9Tn/wVgLjhdNBpOl0zr90ywIDAQABAoIBAQCfq9fI3+g9FPBqYie4yjjO0M3r7Od5Dh2V2dzAbYeFoK2fljtCdItKEAVbb68RGgFomKveTH1rJOavSfLy68ODbQJZ2BoUOv+IOlZHIQxw5K65w3QESVw7wAhmE4QZpGNOHuyiTxnsaIfIyvXAkjmv6z2TKd3/I30ZxudRbc8y9N18bBcQ6Mnf/6o69NFV+PQpzkdPn+nA4mEgfNLNkH6beBuZf7rTdXAHfJfCFdiHmkv9drY8IbnSAawGuO0dMSreuRRkCX7s0/lXB2gnbsyk0D4gGLY8qDH2rHQovZAAngSmA/x2X5ewNFmfCTsmM50vxJl51nARa1HZdBCXNa6BAoGBAN6s5WohfHvGVrh73MOMI5ADQJeeDEf6iz7KIi4tPETLwkt06WhISpknGjDevuBcEg8KKaohGMB9E1JHC0vs4U/6yDwYTxH4Pu2J7uEG8OIwe29la+tYIaYNOiszhclRPB+jl65WqyUZYH3B4RT/lA1n4RIq3O3iJwBM69eM/B9BAoGBAM0OU3sfBWnzCzN2hHp5TgPjhduKKtdu+zDnFG81J/HC6XG0TJxf/DNVW4lEozXxsVMRFQ4iBrZaD6z9aHoYVKryiak/6j9aM7P7J5tgyNE2r6Xi1qAv9HdBwjdmPxV1oaaya9TlHfPuNJ9K6y4vG5MzGZSYI6SXz7CT/jdcL90LAoGBAKQo/JyIgVhSuT4aen9jQhh6fVUJfG5YI+2vYRF/4c2qFdxBHY32taBA9osOu9N1rQ6PZHX7Hl9SFjtzCr33rYekD5hWJ3zM8b93D7evwUhPi8BtGemPuIbNe5O70SbAj72XgkxRsqyQD9XGaCRt4v0bFw+or+Vj83LCQqBPXNPBAoGAWSG8Cc2PJeGeYc1HgpEN50TT33zsaF52U2huinRZm430uRb9Ig/a6VlWA5HRO9aGFKxdMZp6vnLhU3mHG2NOEkyAqA//O3By/u3R5okoYUBbE0lJr7GImvn7eOc5zpMmI/Z0RsMcxPYq636+QYH6g353xQ5ol9fhUEjT/K5Wo8cCgYEApaOD4Nbl7n5yiBBVjj5lTNgEQGvMb+fYKmLnxGHl8pPEJWRmd7C9r58AmNwr8zrvpxouFr7TXEtbrp7jtUw9l7pSuNXmhYnnpLRsaudmSjUvkCPoU8fBiPyr68qd3ac2KWhB1okSgl0VMwIkBLg2AT+XO15qCvv2Zn8x6RBatZY=",

        //异步通知地址
    'notify_url' => "http://www.shouquanquan.com:16888/example/Notify",

        //同步跳转
    'return_url' => "http://www.shouquanquan.com:16888/example/Notify",

        //编码格式
    'charset' => "UTF-8",

        //签名方式
    'sign_type' => "RSA2",

        //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxFn4pDjwvAbIfoMGDiC+3S8B4HEj0CPm+jr8/S5lfcFXoSqmPMVbR0UFl9QUKaSAnZRjA9xyK0P3ZoK63GJEqDr8N+XMz+SxW/36fQYsy7eFbWc33OMQnM1jLH1cE5cxZjrDdFAW8Jjw/EOcDNd4ASBAA9QtV7sWz80xxY1SwjYLV9mphPmYpj71NqoLBNol463Bx6xogYSbvIAYv00CkZg2m7wK/VN7UxnyiBbXjXJzttXuyYwnC6pmEObr+02yhoaxSREvG/5klq4ac+jWKqnfOAGZUtBXMkG0G0jCV2niN/ZosanoyDAfL3INZgbxIqben0/QcqprFfmK20ykuQIDAQAB",
];
