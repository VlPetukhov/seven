<?php
/**
 * Test 7 View file
 *
 * @var string $text
 * @var array $data
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <a href="/"><-Back</a>
            <h1>Task 6</h1>
            <p>Дан 2-х мерный массив, количество элементов в каждой строке может быть разной и заранее не известно. Так же не известно количество строк.
                Нужно разработать алгоритм, на выходе которого получим массив, в котром будет представлены все возможные уникальные комбинации вариантов использующий по одному элементу из каждой строки.
                <br />
                <br />
                Пример<br />
                Исходный массив:<br />
                а1 а2 а3<br />
                b1 b2<br />
                c1 c2 c3<br />
                d1<br /><br />

                Результирующий массив:<br />
                a1 b1 c1 d1<br />
                a1 b1 c2 d1<br />
                a1 b1 c3 d1<br />
                a1 b2 c1 d1<br />
                a1 b2 c2 d1<br />
                a1 b2 c3 d1<br />
                a2 b1 c1 d1<br />
                a2 b1 c2 d1<br />
                a2 b1 c3 d1<br />
                a2 b2 c1 d1<br />
                a2 b2 c2 d1<br />
                a2 b2 c3 d1<br />
                a3 b1 c1 d1<br />
                a3 b1 c2 d1<br />
                a3 b1 c3 d1<br />
                a3 b2 c1 d1<br />
                a3 b2 c2 d1<br />
                a3 b2 c3 d1</p>
        </div>
    </div>
    <?php if($data): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Task results</h2>
            <h3>Result array:</h3>
            <pre>
                <?php foreach ($data as $line): ?>
                    <?= implode(', ', $line) . "\n"; ?>
                <?php endforeach; ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
</div>