<?php

/* @var $this yii\web\View */
/* @var $problems app\models\Problem[] */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <p id="counter">Счетсчик обновиться в ближайшие секунды</p>

        <div class="row">

            <?php foreach ($problems as $problem):?>
                <div class="col-lg-3">
                    <h2><?=$problem->name?></h2>

                    <p>
                        <?=$problem->description?>
                    </p>

                    <img
                        class="img-responsive"
                        src="uploads/<?=$problem->photoBefore?>"
                        alt="<?=$problem->name?>"
                        data-after="uploads/<?=$problem->photoAfter?>"
                        data-before="uploads/<?=$problem->photoBefore?>"
                        onmouseover="hover(this)"
                        onmouseout="back(this)"
                    >
                </div>
            <?php endforeach;?>
        </div>

    </div>
</div>

<script>
    function hover (el) {
        el.src = el.dataset.before;
    }

    function back (el) {
        el.src = el.dataset.after;
    }

    function updateCounter () {
        $.ajax({
            dataType: 'text',
            url: '<?=Url::toRoute(['/site/counter'])?>',
            type: 'get',
            success: function (res) {
                $('#counter').html('Решено задач: ' + res);
            }
        });
    }

setInterval(() => {
    updateCounter();
}, 3000);
</script>