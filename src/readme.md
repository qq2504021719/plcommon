

安装步骤
------------

#### 1.
```
composer require pl/common
```


#### 2.
```
php artisan vendor:publish --provider="Pl\Common\CommonServiceProvider"
```

1.项目错误信息发送邮件(示例)
------------

#### `App\Exceptions\Handler`内`report`方法
```php
use Pl\Common\Lib\MailCommon;

/**
 * Report or log an exception.
 *
 * @param  \Exception  $exception
 * @return void
 */
public function report(Exception $exception)
{
    $data = [];
    $data[0]['title'] = 'Message';
    $data[0]['text'] = $exception->getMessage();
    $data[1]['title'] = 'File';
    $data[1]['text'] = $exception->getFile();
    $data[2]['title'] = 'Line';
    $data[2]['text'] = $exception->getLine();
    $data[3]['title'] = 'Code';
    $data[3]['text'] = $exception->getCode();
    $data[4]['title'] = 'Previous';
    $data[4]['text'] = $exception->getPrevious();
    $data[5]['title'] = 'Trace';
    $data[5]['text'] = $exception->getTrace();
    $data[6]['title'] = 'TraceAsString';
    $data[6]['text'] = $exception->getTraceAsString();

    $MailCommon = new MailCommon();
    $MailCommon->post_email($data); // 调用发送邮件

    parent::report($exception);
}
```

License
------------
`pl/common` is licensed under [The MIT License (MIT)](LICENSE).
