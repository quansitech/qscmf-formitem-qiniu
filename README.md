## 七牛音视频组件

#### 安装

```php
composer require quansitech/qscmf-formitem-qiniu
```

#### 如何使用

```php
$options = [
    'multiple' => true, //是否开启多文件上传 默认关闭
    'type' => 'bigaudio', //重置upload_type,qiniu_audio 的默认值为audio, qiniu_video的默认值为video
];
//如没有特别需求，$options可不传
addFormItem('audio_id', 'qiniu_audio', '音频文件', '', $options)
```

设置.env 七牛的ak 和 sk
```blade
QINIU_AK=**********
QINIU_SK=************
```

修改/app/Common/Conf/config.php，配置上传类型
```php
//UPLOAD_TYPE_*** 其中***为对应的type
'UPLOAD_TYPE_VIDEO' => array(
        'mimes'    => 'video/mp4,video/webm', //允许上传的文件MiMe类型，多个值用逗号分隔
        'maxSize'  => 500*1024*1024, //上传的文件大小限制
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，>多个参数使用数组
        'pfopOps' => "avthumb/mp4/ab/160k/ar/44100/acodec/libfaac/r/30/vb/2400k/vcodec/libx264/s/1280x720/autoscale/1/stripmeta/0", //七牛转码策略
        'pipeline' => 'video', //处理管道
        'bucket' => 'video', //七牛bucket
        'domain' => 'https://***.qscmf.test' //上传至七牛后，访问文件的domain
)
```

勾子：qiniu_notify  
```php
七牛处理通知执行完后处理的回调，可根据业务需要，自定义该勾子的行为，传递参数为数组，数组包含file_id 和 duration。
```
