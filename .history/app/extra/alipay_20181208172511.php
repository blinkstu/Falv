<?php
/**
 * 支付宝支付
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016092300577513",

    //商户私钥, 请把生成的私钥文件中字符串拷贝在此
    'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCR5/dVdwRZYaWHTHnvwfAN0hWukzkTlLMAfo2Eaje0t+xvc92GibYzwzWrgr07gobmHQfZmSkUwMStEHZEonDxmV0Eh+KR6jHWGdnRNK3DLSgcGHt2Ys6wrubA+PEZ3yqdB6l+eHqVuAzn6eW+HtHeBQl3kHGtKot/vvbSZMpMlS/pdGI8oGkl8dkVwHfdTNdbraIuBxT591eEk1nvewf5FRJG8n2vh7tuR4sWnNC5MH/u9G8eJ80UU+hh6KEaz+fV39GebbbkOUTtpu/3EIzfPFg5+Kbt7W4isFLfpbgBuZ+9tLlJMA+3fVlEgb4cE7Unl31G03uEXTk2wy48eabBAgMBAAECggEBAIqwzNJYh7HOt+GcOGxHFUCN6j4/g4mxV1Wo9ixgKwOFsSFgKbqxPJiHfoTBic7/i+tAvS2CASLQ+iLn+wPSxTliZqDf6eZ5j1XMzNeoE2PrkKzkOLeXxJD+MCpOeB/3mjIaDmtBaoTWpq3sD45hDWzVrOISU3wfbOrJQyVK2WFhGqjcNWbqz+zrlIaTVR06L0+Zt7QF92mrvUPuDsKofq74pB469JxPN4F6zQLZ2G9RBmgsSocTt20HJzKeTZu5+/WEjgAGFxmt8lANqBnfL3LAkay7po8dHgAyLp4/0ryNQsp//1fd8ZIuS9Xb+TTjafjX6eknEyUUkEP/dJ4IKgECgYEA4S5UI6wCLSenuTsTmqOaxyI//590eb2PuZkOiVWvPKV8NPz66zbPpxI7LItSm254gdgkzhdbGcadKHqQjWSccsvbDRKlrU+TiN6BIXdSVcPCEWPt1wHQqG3MxL/YVtbjaQF+WLZiIeZzywx8m0zq+gOfO0CSyDL0ZX3lELjI04kCgYEApeAVG1e1xx9p19kySjRnz/IeFGFpXdv38Z8zmg7E+8l1NwKhqEVaI5xgNSGAeMe0Yrcqa2SiCM8mWAsW+6N/Iy6CEu9Pnmh5oeYNvcR0kbQmhm2TVG5qPQWpqqiBEmm6LIMQTNDiVrAyCH91eYfd0Bjy405o9H4fAAC79I/mk3kCgYAd9hwb4vcnKu+WJdYl7T7a4CPDz2OgDyjgeQ0GGPCIETzFkCOSyGg4wqQ8+Qy0wa4nGKtNAK6Ob27Zw/UX2xs16wnqY2DH/p6Sx4hG+6lo3/MifTlYMlWhE3r7cstGQrFfd2NoSlwkRpWBnte1kjZxramyKJVfLeh22Jlx8CRIgQKBgDt75lXN2GQ2AbDkNMKjlG7f9qV8YVrFXV8Kpmiiz0Uz85LsoKhFZpPKqj2ja/zkMO4NnWqxxeG+15NPNsi60wb80KyVoUm/UY8bfuYEo4D0x7QBa4olpneHplaK4u6Fd7wqrBe/+Mr5mJevjaMtdAACUmftYHn9GITZvo1vZVKRAoGBAIeXzRMmKkccCDs9aubcf8ifNQWOONUmsV64qj9du+b/3IVSGHSE+GulTo6vjM+R8QTiBL22S7nfY8sJeWKJxilw/10OcwQzolRAIXqjInEIekDVF/kxZeg5sphDP66sGjkdD1UY2gWA0rVsUOhUc9tfpLjYhlTThqZtdFiL/jPO",

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
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkef3VXcEWWGlh0x578HwDdIVrpM5E5SzAH6NhGo3tLfsb3Pdhom2M8M1q4K9O4KG5h0H2ZkpFMDErRB2RKJw8ZldBIfikeox1hnZ0TStwy0oHBh7dmLOsK7mwPjxGd8qnQepfnh6lbgM5+nlvh7R3gUJd5BxrSqLf7720mTKTJUv6XRiPKBpJfHZFcB33UzXW62iLgcU+fdXhJNZ73sH+RUSRvJ9r4e7bkeLFpzQuTB/7vRvHifNFFPoYeihGs/n1d/Rnm225DlE7abv9xCM3zxYOfim7e1uIrBS36W4AbmfvbS5STAPt31ZRIG+HBO1J5d9RtN7hF05NsMuPHmmwQIDAQAB"
];
