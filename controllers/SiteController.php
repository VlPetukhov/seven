<?php
/**
 * @class SiteController
 * @namespace controllers
 */

namespace controllers;

use app\BaseController;

class SiteController extends BaseController
{

    public function actionIndex()
    {
        $this->render('index');
    }
}
