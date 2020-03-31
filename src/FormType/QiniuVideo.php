<?php
namespace FormItem\Qiniu\FormType;

use Qscmf\Builder\FormType\FormType;
use Think\View;

class QiniuVideo implements FormType{

    public function build(array $form_type){
        $view = new View();
        $view->assign('form', $form_type);
        $content = $view->fetch(__DIR__ . '/qiniu_video.html');
        return $content;
    }
}