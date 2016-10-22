<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
    .back-link{
        font-size: 7pt;
        font-weight: bold;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <a href="view" type="submit" class="btn btn-round btn-dark btn-sm"><i class="fa fa-chevron-circle-left"></i> <text class="back-link">PENGELUARAN KAS</text></a>
                    Tambah Data Otomatis
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Custom</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1">
                                <option></option>
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group"></div>
                    <div class="form-group"></div>
                  
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.ju').attr('class', 'ju active');
        $('.ju .pk').attr('class', 'pk current-page');
        $('.ju .child_menu').attr('style', 'display:block;');

        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });
    });
</script>