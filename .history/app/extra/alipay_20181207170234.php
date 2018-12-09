<?php
/**
 * 支付宝支付
 */

return [
        //应用ID,您的APPID。
        'app_id' => "2016092300577513",

        //商户私钥, 请把生成的私钥文件中字符串拷贝在此
        'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCCHiQz/zAVkq/8XZkEUZosOHePyJyN00U8UikimqINKSwCA4Fq9EZTVj6dKcBoivQk8gDIfPQ34zVPTJEUfQRtGYuiKBIR2AGPbfvlEM9aBeBomfInHpiTgB5UZvq1JWiQHpwMsT8DOAPozO11q3uL+LDlADmSx5We9mn7O98f9Yr2S+G8GT418XQWxxW6eMH5w49pU8TQcEK/f9FmsRckwOys+0kLhp3ndTPrKTCgOFcQqsG7jFzQVYryQWZEt9u7+EVsh1gUO1sKEVDH1C+6LMUlBgKaicziObRYDZi8hZN7ij9ejPN6g6fns/ov/Saw7/Mvxr18yxzYsAx+sudNAgMBAAECggEAJ6UHYtBd1jTbagkaljZGwzJxO13kVVIJxldCMUjsFxZ0Uii/Rdcnljyw1zHhbfjoallR48QupNiVZZPuoE93Cca+xKlw1/74ersIBMMaalNgDH7bSRAJbOecVhsKSCcdtMuewD9A87oddtD5iOC2w+8B9sQaxp4I+GYb5HBZi2LVfBZsRyv6dPCcRM0bRAVAik5RB9ctWulggHi1XCCxvP3PP6+U0DxXvvk8h3NLWInUX2iqjzAb9jLzRCW5yYR6qVzBbBfDFayzozVKQRCzOelmlQUDOYQ/yaPG0oWaWzONxOM4R1q9oOUI45TjUe77OFuTXsLkojQkgyxTS22AAQKBgQDDNkC8MNcrZj2OXzH+R5qUhjySSscH4h93lwdQwILUfQrg9y7aEGAOEY8wjmsv+S/bU+zAjwhPXzXvo/oL+BDVGgZMeyCalLNvCoMM5qaduvBhzaOMoRkZB7ZGPgtgAaHjDhUKkPD24VGstMFS0Lm2BtLDg2Xn+t3MsGmfCkIDUQKBgQCqosM+mbdizLBlCEhfbys/TZfeee6Efm82G9b966Q8h+wK6/eoa1dHsMH33cUlbIFX7TC/oyX1+fU6mXILvrnYGJ6NV6R+joIPE4s4hB1PZkDlAKv/BNTkFfRzJig12RHu4inBYrLlrhWMUb7ffWNFflWmuGaIuWd7wX7BQL0NPQKBgQCs7n3QeQ/UMYFsg2ZdVX9Z/cTg7/97O1UW8yMW5UPBC3i8rBzELud47xNDN5c662v6x1EfkFYTQkwcm83iFoKK1cAotpa+eeavAsfvgNCvQDC845fz966tHsjZVxNqnGeWJh57usTMX/Sjo4jzXVZ3K3pAm0GGjRU5xDn9GvA50QKBgCP1hvXDSR0+C5JPC4lpEREXFgEhav1q857QgR8jsIm9DyZCEf/hFxSZkFbe2nQHiL5x0ssf45kRovdFbP5CpEGA9rDMnnK5L3lj4fv4A4E/CD/6Q0TLzN2ALvKxQNoQM7JG4QvK8+5pIEtg0rugXfJALGalB56ai89NuJubO/v1AoGACwo9A4BSoJZ2Te89qcs48owSSCaP1xUTyoNExTTWNv+0M6ju9p3K1cRsSjRjCurUhOd9cBdVe2ECiVqQaYbDd094OiKyYAG+5CjXN5adV+TvUBxf398+WkmGhUgfl9ujhTyGTt4/qMl68QdUX0vauCOYwcGkvqxDPUajwXIjpGE=",

        //异步通知地址
        'notify_url' => "",

        //同步跳转
        'return_url' => "",

        //编码格式
        'charset' => "UTF-8",

        //签名方式
        'sign_type'=>"RSA2",

        //支付宝网关
        'gatewayUrl' => "https: //openapi.alipaydev.com/gateway.do
",

        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgh4kM/8wFZKv/F2ZBFGaLDh3j8icjdNFPFIpIpqiDSksAgOBavRGU1Y+nSnAaIr0JPIAyHz0N+M1T0yRFH0EbRmLoigSEdgBj2375RDPWgXgaJnyJx6Yk4AeVGb6tSVokB6cDLE/AzgD6Mztdat7i/iw5QA5kseVnvZp+zvfH/WK9kvhvBk+NfF0FscVunjB+cOPaVPE0HBCv3/RZrEXJMDsrPtJC4ad53Uz6ykwoDhXEKrBu4xc0FWK8kFmRLfbu/hFbIdYFDtbChFQx9QvuizFJQYCmonM4jm0WA2YvIWTe4o/XozzeoOn57P6L/0msO/zL8a9fMsc2LAMfrLnTQIDAQAB",
];
