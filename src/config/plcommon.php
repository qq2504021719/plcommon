<?php

return [

    /**
     * 发件人账号
     */
    'username' => env('MAIL_USERNAME'),

    /**
     * 发件人名称
     */
    'name' => env('APP_NAME','pl\common'),

    /**
     * 是否发生邮件 true是 false否
     */
    'switch' => env('PL_COMMON_SWITCH',true),

];
