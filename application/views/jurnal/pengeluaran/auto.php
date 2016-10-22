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
                <fieldset class="form-horizontal form-label-left">
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
                </fieldset>

                <br/>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Kode Akun</th>
                            <th>Keterangan</th>
                            <th>Nomor Bukti</th>
                            <th>Jumlah</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="5"><br/>[DEBET] nama</th>
                        </tr>
                    </tbody>
                    <tbody id="input-debet">
                        <tr class="1">
                            <td>
                                <select class="select2_group form-control">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td class="button-action">
                                <button type="submit" class="btn btn-round btn-success btn-sm add-input"><i class="fa fa-plus"></i></button> 
                                <!--<button type="submit" class="btn btn-round btn-danger btn-sm"><i class="fa fa-close"></i></button>-->
                            </td>
                        </tr>
                    </tbody>
                    <!------------------------------------------------------------>
                    <tbody>
                        <tr>
                            <th colspan="5"><br/><br/>[KREDIT] nama</th>
                        </tr>
                    </tbody>
                    <tbody id="input-kredit">
                        <tr class="1">
                            <td>
                                <select class="select2_group form-control">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td class="button-action">
                                <button type="submit" class="btn btn-round btn-success btn-sm add-input"><i class="fa fa-plus"></i></button> 
                                <!--<button type="submit" class="btn btn-round btn-danger btn-sm"><i class="fa fa-close"></i></button>-->
                            </td>
                        </tr>
                    </tbody>
                    <!---------------------------------------------------------------------->
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <button type="submit" class="btn btn-success" id="simpan-akun-otomatis">Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var ld = 1, lk = 1;

        $('.ju').attr('class', 'ju active');
        $('.ju .pk').attr('class', 'pk current-page');
        $('.ju .child_menu').attr('style', 'display:block;');

        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        $(".select2_group").select2();

        $("table .select2-container").attr('style', 'width:100%;');

        $(document).on('click', '.add-input', function () {
            var id_input = $(this).parent().parent().parent().attr('id');
            var cls = (id_input === 'input-debet') ? ++ld : ++lk;
            var input_clone = $(this).parent().parent().clone();
            $(input_clone).attr('class', cls);
            $(input_clone).find('.select2').remove();
            $(input_clone).find('.select2_group').attr('class', 'select2_group form-control');
            $(input_clone).find('.select2_group').removeAttr('tabindex');
            $(input_clone).find('.select2_group').removeAttr('aria-hidden');
            $("#" + id_input).append(input_clone);
            $("#" + id_input + " ." + cls + " .select2_group").select2();
            $("#" + id_input + " ." + (cls - 1) + " .button-action").text("");
            $("#" + id_input + " ." + (cls - 1) + " .button-action").append("<button type='submit' class='btn btn-round btn-danger btn-sm remove-input'><i class='fa fa-close'></i></button>");
        });

        $(document).on('click', '.add-input', function () {
            var id_input = $(this).parent().parent().parent().attr('id');
            var cls = $(this).parent().parent().attr('class');
            var cls2 = (id_input === 'input-debet') ? ld-- : lk--;
            $("#" + id_input + " ." + cls).remove();
            for (var i = cls; i < cls2; i++) {
                $("#" + id_input + " ." + (i + 1)).attr('class', i);
            }
        });
    });
</script>