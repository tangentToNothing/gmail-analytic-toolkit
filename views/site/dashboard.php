<?php
$this->title = 'Dashboard';
use yii\helpers\Html;
?>
<div class="site-dashboard">
	<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <h4>Analytical Reports</h4><h3><? echo($_SESSION['access token']); ?></h3>
                        <div class="list-group">
                            <a href="#" class="list-group-item ">Basic Report</a>
                            <a href="#" class="list-group-item ">Customer Profile</a>
                            <a href="#" class="list-group-item ">Time-Based Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>