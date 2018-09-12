<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Sticker</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1>Sales Stickers</h1>
            <form method="post" action="./print.php">
                <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="category" name="category">
                            <option>Washer Dryer Set</option>
                            <option>Refrigerator</option>
                            <option>Stove</option>
                            <option>Washing Machine</option>
                            <option>Washer</option>
                            <option>   Dryer</option>
                            <option>   Microwave</option>
                            <option>   Dishwasher</option>
                            <option>   Freezer</option>
                            <option>   Cooktop</option>
                            <option>   Wall Oven</option>
                            <option>Misc.</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row washer_dryer_set washer">
                    <label for="product" class="col-sm-3 col-form-label">Washer</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="washer[]" id="stacked"
                                   value="Stacked" checked>
                            <label class="form-check-label" for="stacked">
                                Stacked
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="washer[]" id="steam"
                                   value="Steam">
                            <label class="form-check-label" for="steam">
                                Steam
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row refrigerator">
                    <label for="product" class="col-sm-3 col-form-label">Color</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" id="color1"
                                   value="Stainless Steel" checked>
                            <label class="form-check-label" for="color1">
                                Stainless Steel
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" id="color2"
                                   value="White">
                            <label class="form-check-label" for="color2">
                                White
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" id="color3"
                                   value="Black">
                            <label class="form-check-label" for="color3">
                                Black
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" id="color4"
                                   value="Black Stainless Steel">
                            <label class="form-check-label" for="color4">
                                Black Stainless Steel
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="color" id="color5"
                                   value="Slate">
                            <label class="form-check-label" for="color5">
                                Slate
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row stove">
                    <label for="product" class="col-sm-3 col-form-label">Stove</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stove" id="stove1"
                                   value="Gas" checked>
                            <label class="form-check-label" for="stove1">
                                Gas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stove" id="stove2"
                                   value="Electric">
                            <label class="form-check-label" for="stove2">
                                Electric
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stove" id="stove3"
                                   value="Dual Fuel">
                            <label class="form-check-label" for="stove3">
                                Dual Fuel
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row washing_machine">
                    <label for="product" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="washingMachine" id="washingMachine"
                                   value="Steam" unchecked>
                            <label class="form-check-label" for="washingMachine">
                                Steam
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row microwave">
                    <label for="product" class="col-sm-3 col-form-label">Microwave</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="microwave" id="microwave1"
                                   value="Over the Range" unchecked>
                            <label class="form-check-label" for="microwave1">
                                Over the Range
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="microwave" id="microwave2"
                                   value="Counter Top" unchecked>
                            <label class="form-check-label" for="microwave2">
                                Counter Top
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row freezer">
                    <label for="product" class="col-sm-3 col-form-label">Freezer</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="freezer" id="freezer1"
                                   value="Upright" unchecked>
                            <label class="form-check-label" for="freezer1">
                                Upright
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="freezer" id="freezer2"
                                   value="Chest" unchecked>
                            <label class="form-check-label" for="freezer2">
                                Chest
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row cooktop">
                    <label for="product" class="col-sm-3 col-form-label">Cooktop</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cooktop" id="cooktop1"
                                   value="Gas" unchecked>
                            <label class="form-check-label" for="cooktop1">
                                Gas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cooktop" id="cooktop2"
                                   value="Electric" unchecked>
                            <label class="form-check-label" for="cooktop2">
                                Electric
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row wall_oven">
                    <label for="product" class="col-sm-3 col-form-label">Wall Oven</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wall_oven" id="wall_oven1"
                                   value="Gas" unchecked>
                            <label class="form-check-label" for="wall_oven1">
                                Gas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wall_oven" id="wall_oven2"
                                   value="Electric" checked>
                            <label class="form-check-label" for="wall_oven2">
                                Electric
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row misc">
                    <label for="product" class="col-sm-3 col-form-label">Misc.</label>
                    <div class="col-sm-9">
                        <div class="">
                            <input class="form-control col-md-3" type="text" name="misc" id="misc" placeholder="Title">
                        </div>
                    </div>
                </div>
                <div class="form-group row washer_dryer_set washer condition1">
                    <label for="category" class="col-sm-3 col-form-label">Condition</label>
                    <div class="col-sm-9">
                        <select class="form-control condition" id="condition1" name="condition1" data-type="1">
                            <option>Refurbished</option>
                            <option>Manufacturer Refurbished</option>
                            <option>New Scratch / Dent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row washer_dryer_set washer condition1">
                    <label for="category" class="col-sm-3 col-form-label">Condition Warranties</label>
                    <div class="col-sm-9">
                        <select class="form-control conditionWarranties1" id="conditionWarranties1" name="conditionWarranties1" data-type="1">

                        </select>
                        <input type="date" name="conditionDate1" id="conditionDate1" />
                    </div>
                </div>
                <div class="form-group row washer_dryer_set dryer">
                    <label for="product" class="col-sm-3 col-form-label">Dryer</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dryer" id="electric1"
                                   value="Electric" checked>
                            <label class="form-check-label" for="electric1">
                                Electric
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dryer" id="gas1"
                                   value="Gas">
                            <label class="form-check-label" for="gas1">
                                Gas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dryerSteam" id="dryerSteam" value="Steam">
                            <label class="form-check-label" for="dryerSteam">
                                Steam
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row washer_dryer_set dryer">
                    <label for="category" class="col-sm-3 col-form-label">Condition</label>
                    <div class="col-sm-9">
                        <select class="form-control condition" id="condition2" name="condition2" data-type="2">
                            <option>Refurbished</option>
                            <option>Manufacturer Refurbished</option>
                            <option>New Scratch / Dent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row washer_dryer_set dryer">
                    <label for="category" class="col-sm-3 col-form-label">Condition Warranties</label>
                    <div class="col-sm-9">
                        <select class="form-control conditionWarranties2" id="conditionWarranties2" name="conditionWarranties2" data-type="2">

                        </select>
                        <input type="date" name="conditionDate2" id="conditionDate2" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control number" id="price" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="compareTo" class="col-sm-3 col-form-label">Compare to</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control number" id="compareTo" name="compareTo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="save" class="col-sm-3 col-form-label">Save</label>
                    <div class="col-sm-3">
                        <label class="col-form-label" id="save">0</label>
                        <input type="hidden" name="save" value="0" />
                    </div>
                    <div class="col-sm-2 p-0">
                        <label class="col-form-label" id="savePercent">0%</label>
                        <input type="hidden" name="savePercent" value="0" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="save" class="col-sm-3 col-form-label">Features</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="feature1" id="feature1">
                        <input type="text" class="form-control" name="feature2"  id="feature2">
                        <input type="text" class="form-control" name="feature3"  id="feature3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="save" class="col-sm-3 col-form-label">Measurements</label>
                    <div class="col-sm-3">
                        <span class="washer_dryer_set">Washer</span><br>
                        <label>H:</label>
                        <input type="text" name="height1" class="form-control number" id="height1" style="display: inline; width:70%;">
                        <br/>
                        <label>W:</label>
                        <input type="text" name="width1" class="form-control number" id="width1" style="display: inline; width:70%;">
                        <br/>
                        <label>D:</label>
                        <input type="text" name="depth1" class="form-control number" id="depth1" style="display: inline; width:70%;">
                    </div>
                    <div class="col-sm-3 washer_dryer_set">
                        <span>Dryer</span><br>
                        <label>H:</label>
                        <input type="text" name="height2" class="form-control number" id="height2" style="display: inline; width:70%;">
                        <br/>
                        <label>W:</label>
                        <input type="text" name="width2" class="form-control number" id="width2" style="display: inline; width:70%;">
                        <br/>
                        <label>D:</label>
                        <input type="text" name="depth2" class="form-control number" id="depth2" style="display: inline; width:70%;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-3">
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
</body>
</html>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {

    $('#category').on('change', function(e) {
        var thisName = $(this).val().toLowerCase().replace(/ /g, '_').replace('.', '');
        $('.washer_dryer_set, .washer, .refrigerator, .freezer, .stove, .washing_machine, .dryer, .dishwaher, .microwave, .cooktop, .wall_oven, .misc').hide();
        $('.' + thisName).show();
        if(thisName.indexOf('washer') == -1 || thisName.indexOf('dryer') == -1) {
            $('.condition1').show();
        }

        if(thisName == 'dryer') {
            $('.condition1').hide();
        }
    }).trigger('change');

    var conditionWarranties = {
        'Refurbished' : ['30-Day New Parts and Labor Warranty Included'],
        'Manufacturer Refurbished':['1 Year Manufacturer Warranty', 'Manufacturer Warranty until __/__/____'],
        'New Scratch / Dent':['1 Year Manufacturer Warranty ']
    };

    $('.condition').on('change', function (e) {
        var type = $(this).data('type');
        var cwEl = $(".conditionWarranties"+type);

        $(cwEl).find('option').remove();

        var selected = $(this).val();
        for(var i in conditionWarranties[selected]) {
            $(cwEl).append('<option>'+conditionWarranties[selected][i]+'</option>');
        }
    }).trigger('change');

    $('#compareTo').on('change', function(e) {
        var price = $('#price').val();
        var compareTo = $(this).val();
        var save = compareTo - price;
        var percent = Math.round(save/compareTo * 100, 0);
        $('#save').text('$'+save);
        $('#savePercent').text(percent+'%');
        $('input[name="save"]').val(save);
        $('input[name="savePercent"]').val(percent);
    });

    $('.number').on('input blur keyup paste', function() {
        $(this).val(function(i, v) {
            return v.replace(/[^0-9\.\/]/ig, '')
                // prevent inserting dots after the first one
                .replace(/([^.]*\.[^.]*)\./g, '$1');
        });
    });

    $('#conditionWarranties1, #conditionWarranties2').on('change', function(e) {
        var type = $(this).data('type');
        if($(this).val().toLowerCase().indexOf('warranty until') != -1) {
            $('#conditionDate'+type).show();
        } else {
            $('#conditionDate'+type).hide();
        }
    }).trigger('change');
});
</script>

<style>
    option {
        height: 10px;
    }
</style>