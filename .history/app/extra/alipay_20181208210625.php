<?php

/**
 * 支付宝支付
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCNq/8UbC1v5oHUlDFxFtXAztCiDZucRma+wQPArDHYw2AgJuRZ9Szi3L/m03ccJPjN1XCHRj3lqY5HfxKPBFNuAHEZreMHejV+HCE8VEQc/g0sbUUSLCH0Nunh1HA2H4wYPQiPU5Cx0opgYPhm+cjLyrabMAp2OEFJZvtaZ50B2ipDyLn4wT2MCIPFoCi5hGNMbH3AbKPyHf22vJuJ3aObq/sL6TVe937b2cMKuO77/sGiBITZr5asXitDRanDnA3XWuM6oUnl2NH+IiQrMGL0/LMY+flJjmKd1xoH5rNLWYDlIFdHCBnZ/rVVTq0mdmDUReGmfHQA3R+PKL9lXx+lAgMBAAECggEAK+KEkIH2DTy9KOmC60IkkqY98IUAmAci2qIVlICCrF/RDgSeJdORxPCWrV0B/4DgZXphcjXrBJJiVXlieVTgtymB32+C7RUJLvhtvy9nLgfwcruicr+jAPBlwKO64rkg/30ggq1jHAJZBQPkzpk/fwlbSXU3OGmyp5cz80w3UZQXrwPszJUS3lOIJOm+oBedn10zfhDme0R/G9iryk1x18jehy5O0SiFpbrGkUCDYwJG5z0K7USW8xTPZzl+/XzHTiZDkLoRxNrGpv/vfgqBeLKzylJkMApnn5y7Jy+CY1F+kDEZZzjGl0DfcmqIqUojx4mdLqCySzjLcfxQ0iiboQKBgQDpEPvpB1EXQ+Hm17EH7Leh1rDADlOt8h/unfRmgKPoO+3Otiqg7LD+LwQFePWSqBZoj6ooiaHznS4JUZKfoT+VyXf3++HvM3BXPjXAjrOcHPIHgqSqIVjRUYgdpOM0wf7yoAeCC73M+bLYmhrUfru6GgaFDrfPpF0AMKBHBjofbQKBgQCbnMGLhHmNE0Vp8NK/k8k3QI7tFN5NzYOVdE9OFIvpLxvgMZ5Fw+9UplKdoJq1ukTbiwiOWJvtihcYX18nWjCGZJmEuWLtgYliwVqCBwS/CR5SzGQU+w6k4awNX7BV1Tsbe6ppDp9iQAb59UXXEYs/pKDuMzDJyht8DqAKh9uGGQKBgGCjQDChbgg9h1+WM7tbddDPGj6oMh4/9OmV6Q7PbCcRIkvB0O8k9UaP7BTw0LJcq93zI9TnLJW8qKgIgMlbrOfIv8u9TzNFmuEx1EvhX6vtfJWMoAZDCXbRXaUdB3CKt9GWdUaA49Qn/PY+/7z4R5Kk0+s77Q9V0ZIQl4SbmmIJAoGACVOj5hDSmDoHdwoQF5tr+/vKlTsi99bRhCusdSmWGSvRp+ZRbi0IMzKk0P3HSA0aA26Z3K5C6kHUkIlm0pz9O5DcArB51XJmIZ0lJ5X0Gt8ZCi1l8jv57Lf57/NERmC5YjRPSmyt8N2VjXW98d4DUpUzcBNxYSbT7uORhBAQgEECgYEArNixeARzKAkIbkP2RJoHI+oGFET9uEZ4i9+WIdsatMFsIM5pVodIsY++0XCpja57tSzEaMGQHVw+Lj0irIiss4z2W4XnQiO4ESeTE/FmliLUZMUEjCTy2DEzaQncwtfYyyMDIiHMZJCzCPJpasq2abwyuvjU0WknHHVLX+4Fq2Q=",

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
