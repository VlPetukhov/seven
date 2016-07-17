<?php
/**
 * Test 1 View file
 *
 * @var string $text
 * @var array $data
 */

/**
 * This is very rough analogue of widget
 *
 * @param array $data
 *
 * @return string
 */
function drawList($data)
{
    $html = [];
    $html[] = '<ul>';
    foreach ($data as $item) {
        $html[] = '<li>';
        $html[] = (isset($item['name'])) ? $item['name'] : '';
        if (isset($item['children']) && !empty($item['children'])) {
            $html[] = drawList($item['children']);
        }
        $html[] = '</li>';
    }
    $html[] = '</ul>';

    return implode('', $html);
}

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <a href="/"><-Back</a>
            <h1>Task 3</h1>
            <p>Дана таблица в базе MySQL с полями:
                id  - ключ
                name  имя,
                parent ссылка на id родителя,

                Данную таблицу нужно заполнить рандомными значениями, но так что бы получилось дерево с несколькими (от 0 до 5) уровнями вложенности

                Реализовать алгоритм выводящий это дерево, вида:
            </p>
            <ul>
                <li>EEE
                    <ul>
                        <li>KK</li>
                        <li>LK</li>
                    </ul>
                </li>
                <li>RE</li>
                <li>LO
                    <ul>
                        <li>EW</li>
                        <li>FS</li>
                    </ul>
                </li>
                <li>DF
                    <ul>
                        <li>JJJ
                            <ul>
                                <li>WW</li>
                                <li>LL
                                    <ul>
                                        <li>SS
                                            <ul>
                                                <li>SD</li>
                                                <li>HR
                                                    <ul>
                                                        <li>JS
                                                            <ul>
                                                                <li>PP</li>
                                                            </ul>
                                                        </li>
                                                        <li>ET</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>ED</li>
                        <li>AC</li>
                    </ul>
                </li>
                <li>PPP</li>
            </ul>
            <p>
                и т.д.
            </p>
        </div>
    </div>
    <?php if($data): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Task results</h2>
            <?= drawList($data); ?>
        </div>
    </div>
    <?php endif; ?>
</div>