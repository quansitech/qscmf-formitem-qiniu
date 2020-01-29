<?php
namespace FormItem\Qiniu;

use Bootstrap\Provider;
use Bootstrap\RegisterContainer;
use FormItem\Qiniu\Controller\QiniuController;
use FormItem\Qiniu\FormType\QiniuAudio;


class QiniuProvider implements Provider {

    public function register(){
        RegisterContainer::registerFormItem('qiniu_audio', QiniuAudio::class);
        RegisterContainer::registerFormItem('qiniu_video', QiniuAudio::class);

        RegisterContainer::registerController('extends', 'qiniu', QiniuController::class);

        RegisterContainer::registerSymLink(WWW_DIR . '/Public/qiniu', __DIR__ . '/../asset/qiniu');
    }
}