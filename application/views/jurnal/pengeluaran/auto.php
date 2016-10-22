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
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Tanggal</label>
                        <div class="col-md-3 col-sm-8 col-xs-12">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Transaksi</label>
                        <div class="col-md-3 col-sm-8 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1">
                                <option></option>
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                            </select>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
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