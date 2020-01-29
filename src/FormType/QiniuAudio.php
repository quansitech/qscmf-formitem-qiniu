<?php
namespace FormItem\Qiniu\FormType;

use Qscmf\Builder\FormType\FormType;
use Think\View;

class QiniuAudio implements FormType{

    public function build($form_type){
        $view = new View();
        $view->assign('form', $form_type);
        $content = $view->fetch(__DIR__ . '/qiniu_audio.html');
        return $content;
    }
}