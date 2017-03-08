<?php
 use app\models\Payments;
 use app\models\Currencies;
 use yii\bootstrap\Html;
?>

<div class="container">
    <div>
        <h2>Избранные валюты</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#paymentsModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

        <div id="area" class="row" style="margin-top: 20px">
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentsModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Платежные системы</h4>
                </div>
                <div class="modal-body">
                    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Выберите платежную систему</h3>
                        </div>
                        <ul class="list-group">
                            <?php foreach (Payments::find()->all() as $key => $val): ?>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-<?= $key ?>" data-toggle="detail-<?= $key ?>">
                                    <div class="col-xs-10">
                                        <?= Html::img('@web/uploads/' . $val['img'], ['style' => 'width: 30px']) ?>
                                        <?= $val['name']?>
                                    </div>
                                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-<?= $key ?>">
                                    <hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                            <?php foreach (Currencies::find()->where(['payments_id' => $key])->all() as $key2 => $val2): ?>
                                            <a href="" class="currency" data-id="<?= $val2['id']?>"><span class="label label-success"><?= $val2['name']?></span></a>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Закрыть</button>
                </div>

            </div>

        </div>
    </div>

</div>

