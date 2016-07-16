<?php
/**
 * Test 1 View file
 *
 * @var array $datum
 * @var array $descriptions
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <h1>Task 1</h1>
            <p>
                Дан текст с включенными в него тегами следующего вида:<br />
                <em>[НАИМЕНОВАНИЕ_ТЕГА:описание]</em> данные <em>[/НАИМЕНОВАНИЕ_ТЕГА]</em><br />
                На выходе нужно получить 2 массива:<br /></p>
            <ul>
                <li>Первый:
                    <ul>
                        <li><em>Ключ</em> - наименование тега</li>
                        <li><em>Значение</em> - данные</li>
                    </ul>
                </li>
                <li>Второй:
                    <ul>
                        <li><em>Ключ</em> - наименование тега</li>
                        <li><em>Значение</em> - описание</li>
                    </ul>
                </li>
            </ul>
            <p>
                Вложенность тегов не допускается.
                Описания может и не быть.
                Обязателен закрвающий тег.
            </p>
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
    <?php if($datum): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Tags data</h2>
            <pre>
                <?php var_dump($datum); ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
    <?php if($descriptions): ?>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-2">
            <hr />
            <h2>Tags description</h2>
            <pre>
                <?php var_dump($descriptions); ?>
            </pre>
        </div>
    </div>
    <?php endif; ?>
</div>