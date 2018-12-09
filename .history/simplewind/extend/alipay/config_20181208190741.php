<?php
$config = array (	
		//应用ID,您的APPID。
	'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
	'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCSDEvHXm/keuP2jcp5aaHpkZeCzb9SHYiBnp2a903FHMr/eoPL8AUwDHtf6YN6caF0WvxSTzEPWwfKulYjM50n17weu8XoBryIeJe4eijLrQ4KTyque0rbFslqYp7NdcW/HSJtlpTxrUCFQWrikSbBC47It5kmubDW4NXk0CkJKvcOgAIWGYZjxJ1J9Thp+hu6v2B3eW9hLrin93dzy6Wr5sUEZdUlm8IZxotViSLuQmdHoMgqnIf6QCCSJ4L01uw/xJKQiZCUrEh4CBJUJo/UagUDShWAXz08VkifT+VqnI4ynl7stS0vhtkJXmkS6355G/7F+zHVBpaIPQ0MbanvAgMBAAECggEBAJB4Y1mzfGH6gph5SGnz6TuATu0QlAoptsfp3KPXsPGketZgHhHVu3v9TOnit7GeyASuoFzXg4NaHAoZa23k97fa+3c3bh0I1OT2zbap+MMJzBK8n078HV8+Wj3HkqlRsCxOKKlZRLsRE/r9bDr1NO3Pfg3lODWLiHf27v8qPv2WKT1p9EFrT2SbLoPPj4Gu3Ggk3+o2Soj1QbizZUyMmOXY+V+xHge0Dh6QssyzvRgoedGMUV3u3IDqA0nBkDjc/1SAwX9QMR3DjeEWDEt3r3x9y8Z8pc+tdRYe87EhNumD5ohT/i2Sw3hk3t0ej2Biq9L5bKDJXqVbdd7tJjYiemkCgYEAw4ViJtUmupsKXadKeZXsIS35Y1RJj+eSbjDFmnadFirpLUgEQq51ZmeDSB3bHdn5I72/UxC0Rh6y7j9p6BvM2Cnzoy6EB9KFBmvq9KJchU5zwdzuG8B3lpwh+k6+P/7vmyWzHdWj9/BRnEdPcZLjI37EP7Jadkf8v4o9VgwEmYUCgYEAvzlSSmSCcK0ypQOnhZvJNox33VI7mBk9WZX+zv2TwYe0Qv6vMRt0CGOSHqI+yRWzmj1M07Xw824uofZJbAE+5cNjNFZitacvGxPZjbmr1CGRuTkpev+HFzB+wh5N7FjTE0u+Oz5axFpEoQHt78jHNdstbZpo9xrIMHSveUKdNeMCgYBm8bGuFIhhtAQPL2fNAJzlE1m9bMGWnSzCC7ffDhjDdTB0gPiNS2HQ2yuKKv4Vh5DfuqYjzCW+zacUPhs69Hg0UFJRVsp5e+RCb0u0JlBkd9wG9JYB0qKkj+xr6E3PUCFEJONcEAJXJxcxG3K+r8IcDECz8OokYN640sZcqdM6KQKBgQC1+vYuaAKe+qUE1zp4824E5J852AVw1SxGcnHBSR9xgRTy4O+W21qMlT28u4jm0ylOMuJHZJG/CO+GIR10lKboAA8MAt4Do+w3Z6eVscotohjNXfH05PMKBZPMZwyfTVTqux15wfidfo5rb6uhk8DJpyFPejBEYY98Vb+cteFpIwKBgAgnI0PEmRNFi/Bcxksw8O0JSRsgnQt3/PeikN5JEZ9T9Nw2t7KL4IXJig7VGLAjYu3RwB49o5yh1koniQl4oi3Cw8EV2TzjpEN1V3gU6QMTrBEW/P4d+TnpJ8RN2rcEkAsV/E0GIPx64cH00fXF8eoX/IcwHSpsp7PtI7f49c3c",

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
	'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkgxLx15v5Hrj9o3KeWmh6ZGXgs2/Uh2IgZ6dmvdNxRzK/3qDy/AFMAx7X+mDenGhdFr8Uk8xD1sHyrpWIzOdJ9e8HrvF6Aa8iHiXuHooy60OCk8qrntK2xbJamKezXXFvx0ibZaU8a1AhUFq4pEmwQuOyLeZJrmw1uDV5NApCSr3DoACFhmGY8SdSfU4afobur9gd3lvYS64p/d3c8ulq+bFBGXVJZvCGcaLVYki7kJnR6DIKpyH+kAgkieC9NbsP8SSkImQlKxIeAgSVCaP1GoFA0oVgF89PFZIn0/lapyOMp5e7LUtL4bZCV5pEut+eRv+xfsx1QaWiD0NDG2p7wIDAQAB",
);