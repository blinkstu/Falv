<?php
/**
 * 支付宝支付
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCoie7nZV7ZRoc0QquzW/Udmmv/GGrzxVk3MOWLTcl7py5KFEJG5H3D1R8tcvqYm6D87Zr0t7U7VW9WqqtOJyK86o1RB4EdcF6uTjOQMA/7uz2gsZI6cxgGYAO1z9to6d8D9AVzrtv/7x2lIsxzVTsQmj+t/rKhNE1IevA3cP7HaFG17HPGdPYRJeS61PGpchYnrcTMSVBx8e+p0UCNcMjKrfEERoyHJvS0la5USNrBrgqiiGLul2cCGr3Pd1uFXXvVLqgyVUOQKOfpX3jda6HAi9A2HOLj5Q0YWvtTgxbvgBM1ID3ISM9ejeEXvDyo687riwk4Ua1G5NPb/zvpuCwJAgMBAAECggEBAI0f+rE+G976BKrJDPdCEAy6yqWvb5cx8BOb2Qn9l7H3+nXDYv/zwi+iHNo0xgvVfUdtOmyiC5pkXreGb60gbiEckjqAeygIeO+hweGBrVCPp/oP1q8kwsBL06+BHmtKMhkgUxRcHhG/yuYFLoeAndW4I4xxkmgT4IbJkq4J6v1TS5vkEPndD/ap/OtKDTxyRUFE++HmqNyL3y0BjynxehWLPkhR0JBrV8hGgVvi15NNpUDv7Zh0bn4Nl6psx7Fzd3W4EV8iQN6aaPIgWWheg8CCggWKWSA6k+xUwSVLJz4KD6FIgnQokzGNfirwzXFiHtki0JQOHinmz5fG9YpwEwECgYEA2fXN0KNsU8v3PKDOmSZr/ZyxVBX06bUaZjX+sYxmNsEqOVUOiPgNW9Wk/h+V9Th0lqgrn3U0i0v5Ai5eonBdtLGRZpee/IY+gdIN/txEEEEDv8z58aFPeG+GUD45w22CKLQfvtdLmsdEtPgx2tgohBqyZyX9Z7Hg86K9vwC9fmECgYEAxfQK2ow7xHrUaPD0V1V7X/OuW2+Qaab+D8WPDjrLnwF2E/NO8VwcufYZt+8T5xa7GEfLpJhKoOvPr8VVANZvtbSJ58/ZDg1R2ypgxBEn4o+2jYQObWpxeRqY2NirFnAKI8r7sTGtnogyMtpNl0oMtpghiLagYA93XUsr4gfsfqkCgYBbE2w6J1+nsE4SRnut4TE021n58ebSFXv/g8Z2eF1pudOj+1fEgipK2n5ENfyaaEnHfmQkEHyxTECz2Z5vsBZn398LCIZFrO7Hnnd8rJvAUvp3FfbHMgmcILX2J9pJQCQoUAQH4bzU4zlhiWiDstlTQjiUA3rc7qY6CCHTg0KrYQKBgAnwvlbJMfsk2+PFLc/w5/giiX/n802K6Dksh4mEZFNAxIgt8KnoIT0pYZM9+zbgilamzFAgoabBELXX5/PZ0NREE6TDaDfvbUvfLerKncEfzGAA4KSX8sjNEB3bi4Pd7nRrrgXw47IRTswE8F6Hhmno684stZL9U9YofzSjhzm5AoGAQXtNkmJh4rGEWsNdUus2JEbnNjOszSWxNUekza04CR3e+PzaNOCJSYI7a3f0obX9LrB0QS8Xdbjjm+ImEtIvR6VgwCuaT3se1OWkjILuW7gmWfBBA2Hz7kbsRXQ8YkMTj5i/ZTWTUuneHnC9wJRqodLrtopvWSyVzoYHWsq566E=",

    //异步通知地址
    'notify_url' => "http://shouquanquan.com:16888/example/Notify",

    //同步跳转
    'return_url' => "http://shouquanquan.com:16888/example/Notify",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type' => "RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqInu52Ve2UaHNEKrs1v1HZpr/xhq88VZNzDli03Je6cuShRCRuR9w9UfLXL6mJug/O2a9Le1O1VvVqqrTicivOqNUQeBHXBerk4zkDAP+7s9oLGSOnMYBmADtc/baOnfA/QFc67b/+8dpSLMc1U7EJo/rf6yoTRNSHrwN3D+x2hRtexzxnT2ESXkutTxqXIWJ63EzElQcfHvqdFAjXDIyq3xBEaMhyb0tJWuVEjawa4Koohi7pdnAhq9z3dbhV171S6oMlVDkCjn6V943WuhwIvQNhzi4+UNGFr7U4MW74ATNSA9yEjPXo3hF7w8qOvO64sJOFGtRuTT2/876bgsCQIDAQAB"
];
