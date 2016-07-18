<?php
/**
 * Test 6 View file
 *
 * @var string $text
 * @var \StdClass $data
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <a href="/"><-Back</a>
            <h1>Task 6</h1>
            <p>Есть массив чисел диапазона с 100000 по 1500000 с 1000000 элементами. Нужно с минимальным использованием процессорного времени найти все повторяющиеся числа.</p>
        </div>
    </div>
    <?php if($data): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Task results</h2>
            <ul>
                <li>Original array size: <?= $data->originalSize; ?></li>
                <li>Repeated elements count: <?= $data->repeatedCnt; ?></li>
                <li>Execution time: <?= $data->executionTime; ?></li>
            </ul>
            <h3>Result array:</h3>
            <pre>
                <?php var_dump($data->resultArray); ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
</div>