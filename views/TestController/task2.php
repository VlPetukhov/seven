<?php
/**
 * Test 1 View file
 *
 * @var string $text
 * @var array $data
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <a href="/"><-Back</a>
            <h1>Task 2</h1>
            <p>
                Дан текст в который включены ключи <em>raz:</em> <em>dva:</em> <em>tri:</em>
                текст может располагаться как перед ключами так и после<br />

                На выходе нужно получить массив,
                где ключ это <em>raz:</em>, <em>dva:</em>, <em>tri:</em>, а ДАННЫЕ - текст раполагающийся после ключа до следующего ключа или до конца текста, если не встретился ключ.
                Очередность ключей может быть – произвльная. Если в тексте ключ встречается второй раз - в массиве он должен быть переписан.
                В решении должны использоваться регулярки.
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <form action="" method="post" class="form-horizontal"  role="form">
                <div class="form-group">
                    <textarea name="data" class="form-control col-xs-12 maxFullWidth"
                              placeholder="Insert text here..."><?=$text;?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php if($data): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Tags data</h2>
            <pre>
                <?php var_dump($data); ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
</div>