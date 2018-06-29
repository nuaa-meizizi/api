<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception;
use PhalApi\Exception\BadRequestException;

use function \PhalApi\DI as di;
use App\Domain\Py as DDy;
/**
 * 2018软件杯 车载App
 *
 * @author: dogstar <chanzonghuang@gmail.com> 2014-10-04
 * @author: Seiry Yu <seiry6@gmail.com> 2018.6.27
 */

class Car extends Api {

    function __construct() {
        $this->Py = new DDy();
    }
	public function getRules() {
        return [
            'index' => [
                'username' 	=> [
                    'name' => 'username', 
                    'default' => 'PhalApi', 
                    'desc' => '用户名'
                ],
            ],
            'eye_predict' => [
                'eyeArgs' => [
                    'name' => 'args',
                    'require' => true,
                    'type' => 'string',
                    'format' => 'utf8',
                    'desc' => '眼动预测参数 各个数之间用空格分割 6个一组；组与组之间使用空格分割 如0.56 0.55 0.0 0.0 0.0035 0.00345 0.56 0.55 0.0 0.0 0.0035 0.00345 0.56 0.55 0.0 0.0 0.0035 0.00345'
                ]
            ],
            'health_predict' => [
                'healthArgs' => [
                    'name' => 'args',
                    'require' => true,
                    'type' => 'string',
                    'format' => 'utf8',
                    'desc' => '健康预测参数'
                ]
            ]
        ];
	}
    
	/**
	 * 默认接口服务
     * @desc 默认接口服务，当未指定接口服务时执行此接口服务
	 * @return string title 标题
	 * @return string content 内容
	 * @return string version 版本，格式：X.X.X
	 * @return int time 当前时间戳
     * @exception 400 非法请求，参数传递错误
	 */
	public function index() {
        return;
        return $this->Py->py();
        return $this->DImagei->index();
        return [
            'title' => 'Hello ' . $this->username,
            'version' => PHALAPI_VERSION,
            'time' => $_SERVER['REQUEST_TIME'],
        ];
    }

/**
 * 眼动预测
 *
 * @desc 参数顺序 <br>RIGHT_CLOS_CONF float 右眼开闭精确度<br>LEFT_CLOS_CONF flaot左眼开闭精确度  <br>BLINKING flaot 眨眼次数<br> BLINK_FREQ flaot 眨眼频率 <br>PUPIL_R_DIAM flaot 右眼瞳孔径大小<br>PUPIL_L_DIAM flaot 左右瞳孔径大小 <br> 按Python的传入方法，用空格分割每个参数 如 <br> 0.56 0.55 0.0 0.0 0.0035 0.00345 <span style="color:blue">0.56 0.55 0.0 0.0 0.0035 0.00345</span> 0.56 0.55 0.0 0.0 0.0035 0.00345
 * @return void
 */
    public function eye_predict(){
        $args = $this->eyeArgs;
        $re = preg_match('/[^0-9\. ]+/', $args);
        if($re > 0){
            throw new Exception('参数传入错误', 403);
        }
        return $this->Py->eye_predict($this->eyeArgs);
    }


/**
 * 健康预测
 *
 * @desc 参数顺序 <br>temperature 温度<br>heartrate 心率<br>weight 体重<br>D 扩张压 <br>S 收缩压 <br> 按Python的传入方法，用空格分割每个参数 如 <br> 37.01471262813102 86 59 113 66 <span style="color:blue"> 35.932006648342394 70 48 140 118</span>
 * @return void
 */
    public function health_predict(){
        $args = $this->eyeArgs;
        $re = preg_match('/[^0-9\. ]+/', $args);
        if($re > 0){
            throw new Exception('参数传入错误', 403);
        }
        return $this->Py->health_predict($this->healthArgs);
    }
}





    /*

            'eye_predict' => [
                'RIGHT_CLOS_CONF' 	=> [
                    'name' => 'RIGHT_CLOS_CONF',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '右眼开闭精确度'
                ],
                'LEFT_CLOS_CONF' 	=> [
                    'name' => 'LEFT_CLOS_CONF',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '左眼开闭精确度'
                ],
                'BLINKING' 	=> [
                    'name' => 'BLINKING',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '眨眼次数'
                ],
                'BLINK_FREQ' 	=> [
                    'name' => 'BLINK_FREQ',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '眨眼频率'
                ],
                'PUPIL_R_DIAM' 	=> [
                    'name' => 'PUPIL_R_DIAM',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '右眼瞳孔径大小'
                ],
                'PUPIL_L_DIAM' 	=> [
                    'name' => 'PUPIL_R_DIAM',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '左眼瞳孔径大小'
                ],
            ],
            'health_predict' => [
                'temperature' => [
                    'name' => 'temperature',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '体温'
                ],
                'heartrate' => [
                    'name' => 'heartrate',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '心率'
                ],
                'weight' => [
                    'name' => 'weight',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '体重'
                ],
                'D' 	=> [
                    'name' => 'D',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '扩张压'
                ],
                'S' 	=> [
                    'name' => 'S',
                    'require' => true,
                    'type' => 'float',
                    'desc' => '收缩压'
                ],
            ]
*/
