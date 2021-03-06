<?php
/**
 * Test 5 View file
 *
 * @var string $text
 * @var array $data
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <a href="/"><-Back</a>
            <h1>Task 5</h1>
            <p>Из таблицы из задания 3 сделать выборку записей без потомков, но с 2-мя старшими родителями</p>
        </div>
    </div>
    <?php if($data): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Task results</h2>
            <pre>
                <?php var_dump($data); ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
</div>