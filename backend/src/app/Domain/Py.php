<?php
namespace App\Domain;

use function \PhalApi\DI as di;

//use App\Model\Examples\CURD as ModelCURD;
//use App\Model\Imagei as MImagei;

class Py {

    function __construct() {
        //$this->MImagei = new MImagei();
    }

    public function index(){
        //return $this->MImagei->get();
    }

    public function py(){
        $py = '"' . di()->pypath . 'a.py' . '"';
        $command = "python {$py} a";
        $re = exec($command);
        return $re;
    }

    public function health_predict($args){
        $py3 = di()->py3;
        $dir = di()->pypath;
        $py = '"' . di()->pypath . 'health_predict.py' . '"';
        $command = "cd {$dir} && {$py3} {$py} {$args}";
        $re = exec($command);
        return $re;
    }

    public function eye_predict($args){
        $py3 = di()->py3;
        $dir = di()->pypath;
        $py = '"' . di()->pypath . 'predict.py' . '"';
        $command = "cd {$dir} && {$py3} {$py} {$args}";
        $re = exec($command);
        return $re;
    }
}
