<?php
/**
 * @class TestController
 * @namespace controllers
 */

namespace controllers;

use app\BaseController;
use models\TagParser;

class TestController extends BaseController
{
    public function actionTask1()
    {
        $text = $_POST['data'];

        if (!$text) {
            $text = '';
        }

        $parser = new TagParser($text);

        $this->render(
            'task1',
            [
                'text' => $text,
                'datum' => $parser->getDatum(),
                'descriptions' => $parser->getDescriptions(),
            ]
        );
    }
}

