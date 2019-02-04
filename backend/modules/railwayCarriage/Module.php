<?php

namespace backend\modules\railwayCarriage;

use Yii;

use yii\base\BootstrapInterface;
use yii\filters\AccessControl;
/**
 * flea-market module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\railwayCarriage\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function bootstrap($app)
    {

        $app->getUrlManager()->addRules(
            require(__DIR__ . '/config/routes.php'),
            false
        );
    }
}
