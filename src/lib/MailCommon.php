<?php
/**
 * Created by PhpStorm.
 * User: EricPan
 * Date: 2019/5/13
 * Time: 15:15
 */

namespace Pl\Common\Lib;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class MailCommon
{
    /**
     * 邮件发送
     * Created by PhpStorm.
     * User: EricPan
     * Date: 2019/5/13
     * Time: 13:41
     * @param array $data 数据
     * @param string $subject 报错信息
     * @param string $type 模板
     * @param string null $to 收件人邮箱
     * @param string null $from 发件人邮箱
     * @param string null $from_name 发件人名称
     */
    public function post_email($data,$subject = '报错信息',$view_str = 'vendor.common.emailError',$to = null,$from = null,$from_name = null)
    {
        // 收件人邮箱
        $to = $to == null?config('plcommon.username'):$to; // 收件人邮箱
        $from = $from == null?config('plcommon.username'):$from; // 发件人邮箱
        $from_name = $from_name == null?config('plcommon.name'):$from_name; // 发件人名称
        // 邮件发送
        $num = Mail::send($view_str,['data' => $data],function($message) use($subject,$to,$from,$from_name){
            $message->from($from, $from_name);
            $message->subject($subject);
            $message->to($to);
        });

        Log::info('邮件发送返回:'.$num);

        return $num;
    }
}