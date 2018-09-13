<?php
error_reporting(E_ERROR);
$h1 = $_POST['category'];
$h2 = $_POST['condition1'];
$warranty = $_POST['conditionWarranties1'];
$price = $_POST['price'];
$extended_warranty = 0;

/**
 * @param $price
 * @return int
 */
function getExtendedWarrantyPrice($price) {
    $extended_warranty = 0;
    if ($price >= 99 && $price <= 399) {
        $extended_warranty = 49;
    } else if ($price >= 400 && $price <= 599) {
        $extended_warranty = 75;
    } else if ($price >= 600 && $price <= 899) {
        $extended_warranty = 99;
    } else if ($price >= 900) {
        $extended_warranty = 149;
    }
    return $extended_warranty;
}

/**
 * @param $condition_date
 * @return false|string
 */
function getFormattedDate($condition_date) {
    if (strlen($condition_date) > 0) {
        $condition_date = date('d/m/Y', strtotime($condition_date));
    }
    return $condition_date;
}

/**
 * @param $condition_warranty
 * @param $condition_date
 * @return mixed
 */
function getConditionWarranty($condition_warranty, $condition_date) {
    if (stripos($condition_warranty, 'warranty until') !== false) {
        $condition_warranty = str_replace('__/__/____', getFormattedDate($condition_date), $condition_warranty);
    }
    return $condition_warranty;
}

function isStackedCheckedInWasherDryerSet() {
    return in_array('Stacked', $_POST['washer']);
}

/**
 * @param $category
 */
function setVariables($category) {
    global $h2, $warranty;

    if($category == 'Washer Dryer Set' && !isStackedCheckedInWasherDryerSet()) {
        if ($_POST['condition1'] == $_POST['condition2']) {
            $h2 = $_POST['condition1'];
        } else {
            $h2 = sprintf('<span style="text-align: left;">%s Washer<br/>%s Dryer</span>', $_POST['condition1'], $_POST['condition2']);
        }

        if ($_POST['condition1'] == $_POST['condition2']) {
            $warranty = sprintf('%s', getConditionWarranty($_POST['conditionWarranties1'], $_POST['conditionDate1']));
            if($_POST['condition1'] == 'Neu Refurbished') {
                $warranty .= sprintf('<br><b>+ 1 Year Extended Warranty Available for $%d</b>', getExtendedWarrantyPrice($_POST['price']));
            }
        } else {
            if($_POST['condition1'] == 'Neu Refurbished') {
                $ext_text1 = sprintf('<br><b>+ 1 Year Extended Warranty Available for $%d</b>', getExtendedWarrantyPrice($_POST['price']/2));
            }
            if($_POST['condition2'] == 'Neu Refurbished') {
                $ext_text2 = sprintf('<br><b>+ 1 Year Extended Warranty Available for $%d</b>', getExtendedWarrantyPrice($_POST['price']/2));
            }
            $warranty = sprintf('Washer - %s %s<br>
                Dryer - %s %s', getConditionWarranty($_POST['conditionWarranties1'], $_POST['conditionDate1']), $ext_text1, getConditionWarranty($_POST['conditionWarranties2'], $_POST['conditionDate2']), $ext_text2);
        }

    } else {
        $condition_index = ($category == 'Dryer') ? 2 : 1;
        $h2 = $_POST['condition' . $condition_index];
        $warranty = sprintf('%s', getConditionWarranty($_POST['conditionWarranties'.$condition_index], $_POST['conditionDate'.$condition_index]));

        if ($_POST['condition' . $condition_index] == 'Neu Refurbished') {
            $warranty .= sprintf('<br><b>+ 1 Year Extended Warranty Available for $%d</b>', getExtendedWarrantyPrice($_POST['price']));
        }
    }
}

/**
 * @param $name
 * @return string
 */
function getVariable($name) {
    if(is_array($_POST[$name])) {
        return implode(' ', $_POST[$name]);
    }
    return $_POST[$name];
}

switch ($_POST['category']) {
    case 'Washer Dryer Set':
        $h1 = sprintf('%s Washer and %s%s Dryer %s', getVariable('washer'), $_POST['dryer'], ' ' . $_POST['dryerSteam'],
            !isStackedCheckedInWasherDryerSet() ? 'Set' : '');
        break;

    case 'Refrigerator':
        $h1 =  sprintf('%s %s', $_POST['color'], $_POST['category']);
        break;

    case 'Stove':
        $h1 =  sprintf('%s %s', $_POST['stove'], $_POST['category']);
        break;

    case 'Washing Machine':
        $h1 =  sprintf('%s %s', $_POST['washingMachine'], $_POST['category']);
        break;

    case 'Washer':
        $h1 =  sprintf('%s %s', getVariable('washer'), $_POST['category']);
        break;

    case 'Microwave':
        $h1 =  sprintf('%s %s', $_POST['microwave'], $_POST['category']);
        break;

    case 'Freezer':
        $h1 =  sprintf('%s %s', $_POST['freezer'], $_POST['category']);
        break;

    case 'Cooktop':
        $h1 =  sprintf('%s %s', $_POST['cooktop'], $_POST['category']);
        break;

    case 'Wall Oven':
        $h1 =  sprintf('%s %s', $_POST['wall_oven'], $_POST['category']);
        break;

    case 'Misc.':
        $h1 =  sprintf('%s', $_POST['misc']);
        break;
}
setVariables($_POST['category']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Print Sales Sticker</title>
    <style type="text/css" media="all">
        @page {
            size: 4.1in 5.8in;
            margin: 4mm;
        }

        html, body{
            padding: 0;
            margin: 2mm;
            width: 109mm;
            height: 152mm;
        }

        .table {
            width: 5.5in;
            height: 5.8in;
        }

        .table td {
            padding-top: 0;
            padding-bottom: 0;
            border-top: none;
            font-size: 4.7vw;
        }

        .price {
            font-size: 16vw;
            font-weight: bold;
            text-align: center;
        }

        #footer {
            position: absolute;
            bottom: 2mm;
            font-size: 1em;
            line-height: 1em;
            text-align: right;
            width: 5in;
        }

    </style>
</head>
<body>

<div class="container">
<table class="table">

    <tr class="d-print-none">
        <td colspan="3">
            <a href="./index.php" class="btn btn-success btn-lg">Back</a>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="headings">
            <h1 class="text-center"><?= $h1 ?></h1>
            <h2 class="<?=(strpos($h2, '<span') !== false) ? '' : 'text-center'?>"><?= $h2 ?></h2>
            <hr/>
            <h1 class="text-center price">$<?= $_POST['price'] ?></h1>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Compare</b></td>
        <td colspan="2">$<?= $_POST['compareTo'] ?></td>
    </tr>
    <tr>
        <td><b>Save</b></td>
        <td colspan="2">$<?= $_POST['save'] ?> (<?= $_POST['savePercent'] ?>% off)</td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td><b>Warranty</b></td>
        <td colspan="2"><?=$warranty?></td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">
            <u><b>Features:</b></u><br/>
            <?= $_POST['feature1'] ?><br/>
            <?= $_POST['feature2'] ?><br/>
            <?= $_POST['feature3'] ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <?php
        if(strlen($_POST['width2']) > 0 && !isStackedCheckedInWasherDryerSet()) {
            ?>
            <td>
                <div align="left">
                    <b><u>Washer</u></b><br>
                    <b>H: </b><?= $_POST['height1'] ?>"<br>
                    <b>W: </b><?= $_POST['width1'] ?>"<br>
                    <b>D: </b><?= $_POST['depth1'] ?>"
                </div>
            </td>
            <td>
                <div align="left">
                    <b><u>Dryer</u></b><br>
                    <b>H: </b><?= $_POST['height2'] ?>"<br>
                    <b>W: </b><?= $_POST['width2'] ?>"<br>
                    <b>D: </b><?= $_POST['depth2'] ?>"
                </div>
            </td>
            <?php
        } else {
            ?>
            <td>
                <div align="left">
                    <b>H: </b><?= $_POST['height1'] ?>"<br>
                    <b>W: </b><?= $_POST['width1'] ?>"<br>
                    <b>D: </b><?= $_POST['depth1'] ?>"
                </div>
            </td>
            <td></td>
            <?php
        }
        ?>
        <td></td>
    </tr>
</table>

    <div id="footer">
        Ref # : <?=$_POST['trackingNo']?>
    </div>

</div>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {

        <?php
        if($_POST['category'] != 'Washer Dryer Set') {
        ?>
            $('td:not(.headings)').css('font-size', '5.6vw');
        <?php
        }
        ?>

        window.print();
        //window.location.href = './index.php';
    });
</script>
</body>
</html>



