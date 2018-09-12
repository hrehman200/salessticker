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

function getConditionWarranty($condition_warranty, $condition_date) {
    if (stripos($condition_warranty, 'warranty until') !== false) {
        $condition_warranty = str_replace('__/__/____', getFormattedDate($condition_date), $condition_warranty);
    }
    return $condition_warranty;
}

/**
 * @param $category
 */
function setVariables($category) {
    global $h2, $warranty;

    if($category == 'Washer Dryer Set') {
        if ($_POST['condition1'] == $_POST['condition2']) {
            $h2 = $_POST['condition1'];
        } else {
            $h2 = sprintf('%s Washer, %s Dryer', $_POST['condition1'], $_POST['condition2']);
        }

        if ($_POST['condition1'] == $_POST['condition2']) {
            $warranty = sprintf('Washer and Dryer - (%s', getConditionWarranty($_POST['conditionWarranties1'], $_POST['conditionDate1']));
            if($_POST['condition1'] == 'Refurbished') {
                $warranty .= sprintf('<br>+ 1 Year Extended Warranty Available for $%d', getExtendedWarrantyPrice($_POST['price']));
            }
            $warranty .= ')';
        } else {
            if($_POST['condition1'] == 'Refurbished' || $_POST['condition2'] == 'Refurbished') {
                $ext_text1 = sprintf('<br>+ 1 Year Extended Warranty Available for $%d', getExtendedWarrantyPrice($_POST['price']/2));
            }
            $warranty = sprintf('Washer - (%s)<br>
                Dryer - (%s) %s', getConditionWarranty($_POST['conditionWarranties1'], $_POST['conditionDate1']), getConditionWarranty($_POST['conditionWarranties2'], $_POST['conditionDate2']), $ext_text1);
        }

    } else {
        $condition_index = ($category == 'Dryer') ? 2 : 1;
        $h2 = $_POST['condition' . $condition_index];
        $warranty = sprintf('%s - (%s', $category, getConditionWarranty($_POST['conditionWarranties'.$condition_index], $_POST['conditionDate'.$condition_index]));

        if ($_POST['condition' . $condition_index] == 'Refurbished') {
            $warranty .= sprintf('<br>+ 1 Year Extended Warranty Available for $%d', getExtendedWarrantyPrice($_POST['price']));
        }
        $warranty .= ')';
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
    case 'Washer Dryer Set ':
        $h1 = sprintf('%s Washer and %s%s Dryer Set', getVariable('washer'), $_POST['dryer'], ' ' . $_POST['dryerSteam']);
        setVariables($_POST['category']);
        break;

    case 'Refrigerator':
        $h1 =  sprintf('%s %s', $_POST['color'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Stove':
        $h1 =  sprintf('%s %s', $_POST['stove'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Washing Machine':
        $h1 =  sprintf('%s %s', $_POST['washingMachine'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Washer':
        $h1 =  sprintf('%s %s', getVariable('washer'), $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Microwave':
        $h1 =  sprintf('%s %s', $_POST['microwave'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Freezer':
        $h1 =  sprintf('%s %s', $_POST['freezer'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Cooktop':
        $h1 =  sprintf('%s %s', $_POST['cooktop'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Wall Oven':
        $h1 =  sprintf('%s %s', $_POST['wall_oven'], $_POST['category']);
        setVariables($_POST['category']);
        break;

    case 'Misc.':
        $h1 =  sprintf('%s', $_POST['misc']);
        setVariables($_POST['category']);
        break;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Print Sales Sticker</title>
    <style type="text/css" media="print">
        @page {
            size: 4.1in 5.8in;
            margin: 0;
        }

        html, body, .table {
            padding: 0;
            margin: 0;
            width: 109mm;
            height: 152mm;
            font-size: 3vw;
        }

        .table td {
            padding-top: 0;
            padding-bottom: 0;
            border-top: none;
        }

        .price {
            /*font-size: 2vw;*/
            font-weight: bold;
            text-align: center;
        }

        #footer {
            position: absolute;
            bottom: 0;
            font-size: 9px;
            line-height: 1em;
            text-align: center;
            width: 76.2mm;
        }
    </style>
</head>
<body>

<div class="container">
<table class="table">
    <tr>
        <td colspan="3">
            <h1 class="text-center"><?= $h1 ?></h1>
            <h2 class="text-center"><?= $h2 ?></h2>
            <hr/>
            <h1 class="text-center price">$<?= $_POST['price'] ?></h1>
        </td>
    </tr>
    <tr>
        <td><b>Compare</b></td>
        <td colspan="2">$<?= $_POST['compareTo'] ?></td>
    </tr>
    <tr>
        <td><b>Save</b></td>
        <td colspan="2">$<?= $_POST['save'] ?> (<?= $_POST['savePercent'] ?>%)</td>
    </tr>
    <tr>
        <td><b>Warranty</b></td>
        <td colspan="2"><?=$warranty?></td>
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
        <td></td>
        <?php
        if(strlen($_POST['width2']) > 0) {
        ?>
            <td>
                <div align="right">
                    <b>H: </b><?= $_POST['height1'] ?>"<br>
                    <b>W: </b><?= $_POST['width1'] ?>"<br>
                    <b>D: </b><?= $_POST['depth1'] ?>"
                </div>
            </td>
            <td>
                <div align="right">
                    <b>H: </b><?= $_POST['height2'] ?>"<br>
                    <b>W: </b><?= $_POST['width2'] ?>"<br>
                    <b>D: </b><?= $_POST['depth2'] ?>"
                </div>
            </td>
        <?php
        } else {
        ?>
            <td></td>
            <td>
                <div align="right">
                    <b>H: </b><?= $_POST['height1'] ?>"<br>
                    <b>W: </b><?= $_POST['width1'] ?>"<br>
                    <b>D: </b><?= $_POST['depth1'] ?>"
                </div>
            </td>
        <?php
        }
        ?>
    </tr>
</table>
</div>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        window.print();
    });
</script>
</body>
</html>



