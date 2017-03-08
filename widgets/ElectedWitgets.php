<?php

namespace app\widgets;

use yii\base\Widget;

class ElectedWidgets extends Widget
{

    public function init()
    {
        parent::init(); 
    }

    public function run()
    {
        parent::run();
        return $this->render('/widgets/elected/view');
    }

}