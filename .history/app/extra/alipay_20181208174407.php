<?php
/**
 * 支付宝支付
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC5kyH7eu/eXyfteLrS3gMOJ9w7Rq0cdsTVMb5chX62ciBvbZVDtR75PV5y7GSxvDOnme/vIsm+tOUt/OjSXB9i2AhrmnApkV5Jcomvb+FZthY9btgebrNtf+ioD8HZBQ3Ctpe82YXWNBFXpF/Fi3OQRA4ao+tdiV+ExAemQtSWKj0wfyRLJKK1gF0vq5JAvXV2YOqJcbgy9h3yLqRCXEXRhSx44RDS84D9IyoPRMXxwGUbOkDkKBT5Mk3bVvckWDRZHJbsp862o1Kdw1Lg9KGX1EQ2zccFv3/qegtsCW2QHP7IB1s2ANyjZGTAY630POz5eumceN0mc4ouRQ2TqUyxAgMBAAECggEBAIlq7JUemhVe/WAaMK4JfNW0qp6yXWpggK0mosI8kHJl3KLm0MtMid0ilpgfeQksRkvr8AJzDlXL+pGtYHK1iQBW3RVhTYFahil5SX/CJ2uZLKrdM+iFLRT+zLf2wyMDXQc80uwjX7oY4Ga377uG4lKIMrGDhLzFBxh3WPrDLkzrQyBrOLsC1mUaTvwle3uWaFEskopYe7yFe/pNyczjQAPdVdwk7vnXJ/YM2dDxGti9QWXb2ImE5ID4EsCi8DHkfLifA2L/O+T7cO+ArwqZ1bO61dUAImjmw0dpVFF4fpSPn6blzJFVQ3JxI/O68p2/iWU7IJBT8kSuhSdXErAg5ikCgYEA5Uky6jV1nS/MH4gNiljmzml9wIx4Xtjg90VdsG29Crxcu7YQ1vuPpamyd4cgvg/z6gYkNUg6KvkftQQ+9HtN3BlZgUosqRGD7z2hziwtQ/DXyY3rztDzm94elcfY58qj4F8utKN52wqooDzVM0z8JGSbwg/2fhlBwrc2U+cJATsCgYEAzzIuWnDcTlm3d/6sxXyTT6/Bmvx7ukgWj+oHkfasI7KUn5iQ+MOIsD5DAVpuuiYvOBqeTy+yt4dq9Mqy73GuFzuo0IU7kSZwimKUoOOzilsNxe+h4V7E+Azse9HN4M2jTBmAVoWwTlnHCHvsjZ5uq7ZS0+OLpv1oQCY12F52SwMCgYAA7HKQDvcSUwb3eYzUaddELZicFfTGLQl69YSTGV4RlQCqoOkgdJL3j99wK9Mt8NKCttOeg1P4qFhAWmwGgBioMlHx+2KCq9dkN1NXiUYFaAr2fOPeSWkxz4s//zYYePCADuIZSC9NepWDT7tsIXtCikU2WuobR+7D4gkN/XhD0QKBgQCLHoKJL2Z9JThPVazkHTU8OCKi0gyxk12y28yhcSM8BNhOIL6WiZPp4qRS8EmQq7rgzN6nBLvXBxIFs2RZ6daeuuwqtoq8dzbxdCefr8QJjgG9eZ0UGfHfK65NpR27Z9fRbP4DGli7AwTk6XB31n0wxobuxsYqJdQt3nohAawjyQKBgQDDZ8qIme79y3CpHr9dH2kt56ecJcI9Tq4b8RVMzSoHe/vfiGjY7Hy0RpD66aw/lzkrB9W46XknwnXRF9nhvEfgTDF0N12ZWbzB/TIUmPmk/S3rsnU6u1oIA0ws3bYFlad7XiK3onT9FtnO8/ze7lPTMa3SpAH7EyzxQIIfEGyyBw==",

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
