<?php
/**
 * @class TestController
 * @namespace controllers
 */

namespace controllers;

use app\BaseController;
use models\ComboProcessor;
use models\DigitsProcessor;
use models\KeyParser;
use models\TagParser;
use models\tree\Tree;

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

    public function actionTask2()
    {
        $text = $_POST['data'];

        if (!$text) {
            $text = '';
        }

        $parser = new KeyParser($text);
        $this->render(
            'task2',
            [
                'text' => $text,
                'data' => $parser->getData(),
            ]
        );
    }

    public function actionTask3()
    {
        $tree = new Tree();

        $this->render(
            'task3',
            [
                'data' => $tree->getTree()->toArray(),
            ]
        );
    }

    public function actionTask4()
    {
        $tree = new Tree();
        $minDescendersQuantity = 3;

        $this->render(
            'task4',
            [
                'data' => $tree->getRootElementsWithDescenders($minDescendersQuantity),
            ]
        );
    }

    public function actionTask5()
    {
        $tree = new Tree();
        $ancestorsQuantity = 2;

        $this->render(
            'task5',
            [
                'data' => $tree->getElementsWithoutDescenders($ancestorsQuantity),
            ]
        );
    }

    public function actionTask6()
    {
        $processor = new DigitsProcessor();

        $this->render(
            'task6',
            [
                'data' => $processor->getRepeatableValues(),
            ]
        );
    }

    public function actionTask7()
    {
        $processor = new ComboProcessor();

        $this->render(
            'task7',
            [
                'data' => $processor->getResult(),
            ]
        );
    }
}

