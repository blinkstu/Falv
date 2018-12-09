<?php
/**
 * 支付宝支付
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC4/pJJaxVf4GwC+7JbyuVQCdsXEgHRCyjoDX2BRbrxrVhClu8+yb3dNC+R0SzI0krlbCRoJ3DAq4PS+clygv0k42pdhCpUsXjSii4LiGdZLQ3aKgOsk2EoGCf7koyEG3GyOLG6+D/2ayj9JZjKjP5HSggRkp0raNh45On9zKkcG34YWw1SJCIPVkayBTJgD9g316mQF7AyfCzaUqzNPsBQ3Vs5T7QuEp9oxX0fxaM56KfuKjuE2jAGBOiMCnlpz1Yxt1wkhcduLplmMi52BX+W/l0f/ZLnw14av9xKjRGCtpQqRR6ePlX0230imIWqBHEGohT9OiP3Mvt8zH1w06TNAgMBAAECggEBAJu0oXosKGR3Z1IneZrrLpFsijxjyqWhh/+xAxbgkxXBukzp71rgwO7Dctp/vfsVjTaHDCmiMLPqaN0Voym/+MOoqikmCd8ZNUG4TkMkvx/+3O7oeAk0Tw1JL7X+RkkXNF42e9mMA4Ir9ecEUxMBEzD7rcjkp2cXK0SuIAifzyK4zC3cLpJYPdjxe+B/Ol6siMRhXS1kRsQOqTrlz24eZQz9FySA104Lrx5Zw6Vw9JSCjvvq+N1VaKrEjSXgl28G4dG/WJz3Ehw88gpn050zKzLR34M2eadL2dFahoIN3zAZ0eZGtHaCNh99bNhavNFMGJmFp4kgF9eplmoZ4/Lufn0CgYEA9XOTYmkd1FxwR7C4fAimqp1C5SICliZ2cTEGs+oV6n0KcHuLR769km1YqWGS+fs1YLByvUqYTyRD7bbHSiEyU5Cpkd4gam+PvVH2UHE+1rtBO4iPNHEn/nZThSrtfDyJfFJiBQMA0ca+zXkr/2IF7zmwu7CU2aMrSwoL6BRv3mMCgYEAwPHa96VlvURC009+pR1aVsUA51q33meJFuZmQwD5TnCHp2Xv62ceJuuYZ99Gny0wd0Smi5jE66vX6nP/l6H8yoa5lTfUVmmMSjd3+OTzBnwx7JBCyn8jqgWhk9HooqUVcCtr7Q+9O4zsoKKp+rV1/TEIfjbxDd3wVejBrbCL/w8CgYAuYJMlkhUHzhuNADArh3ruW96K6t0wP747bvcEQaO4db3mOQG9IaYyJ6UMBBrATx3r0gssBw82TPTk0pdfQ1x9+6R+okjfs4qmS/lNg8hKzIDr3capMwRKiVMIo27R/aJAslRA/CtId9QPgOi2TXAvnmftXtURNkp02EYdqNbmXwKBgQCg1Xq30JG8cXha+PsS3CMADXwxXnfC1v95rVk1JUysTDVoHxsdWXnS67TBcWdHLL4nzXwfBZuw8DAt6b/3QDqfACsW7dD8r0MYYqCJQyAqGcDr910Vu2GZStRjiiin24DBXhC7LdGKIHDnfnC+4iCWjBcOTvIlownCMyGvjWlFlQKBgGcJ52+u5ETtip1kyJ+t0saitRCg1wbEopATwVt6nRIrGg4WiC32ZYuiD2AD+LkYmksXm2P1xnnvwHkT/Okv04TtWQh37rBpKMtsPeixB69kwRa9qAaoDQICyEZ6a9fVIcE5IGQyssR1GuAVyRsqNL0b+PJQaxzvaWF5WZRQ/w4p",

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
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuP6SSWsVX+BsAvuyW8rlUAnbFxIB0Qso6A19gUW68a1YQpbvPsm93TQvkdEsyNJK5WwkaCdwwKuD0vnJcoL9JONqXYQqVLF40oouC4hnWS0N2ioDrJNhKBgn+5KMhBtxsjixuvg/9mso/SWYyoz+R0oIEZKdK2jYeOTp/cypHBt+GFsNUiQiD1ZGsgUyYA/YN9epkBewMnws2lKszT7AUN1bOU+0LhKfaMV9H8WjOein7io7hNowBgTojAp5ac9WMbdcJIXHbi6ZZjIudgV/lv5dH/2S58NeGr/cSo0RgraUKkUenj5V9Nt9IpiFqgRxBqIU/Toj9zL7fMx9cNOkzQIDAQAB"
];
