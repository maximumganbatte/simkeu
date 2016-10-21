<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Akun <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" id="kode-akun" name="kode_akun" class="form-control col-md-7 col-xs-12" maxlength="8" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" id="nama-akun" name="nama_akun" class="form-control col-md-7 col-xs-12" maxlength="64" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Up</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input id="kode-akun-up" name="kode-akun-up" class="easyui-combotree" data-options="url:'dataakun_ct',method:'get',lines: true" style="width: 99%" editable="true"/>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" id="simpan-akun">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Akun <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="table-akun" class="easyui-treegrid" style="width: 99%"
                       data-options="
                       url: 'dataakun_tg',
                       method: 'get',
                       lines: true,
                       idField: 'id',
                       treeField: 'id'
                       ">
                    <thead>
                        <tr>
                            <th data-options="field:'id'">Kode</th>
                            <th data-options="field:'text'">Name</th>
                            <th data-options="field:'edit'" align="center"></th>
                            <th data-options="field:'delete'" align="center"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger pull-right" id="yes-button">YA</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">TIDAK</button>
            </div>

        </div>
    </div>
</div>


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/jquery-easyui/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/jquery-easyui/themes/icon.css">
<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

<script type="text/javascript" src="<?= base_url() ?>assets/vendors/jquery-easyui/jquery.easyui.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?= base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>

<script>
    $(function () {

        function isEmpty(val) {
            var v = val.replace(/ /gi, '');
            if (v) {
                return false;
            } else {
                return true;
            }
        }

        function notifikasi(text, type, delay) {
            new PNotify({
                text: text,
                type: type,
                styling: 'bootstrap3',
                icon: false,
                delay: delay,
                hide: true,
                history: {
                    history: false
                },
                addclass: "stack-modal",
                stack: {
                    "dir1": "down",
                    "dir2": "right",
                    "modal": false,
                    "overlay_close": true
                }
            });
        }

        //-------------------------------

        var kode_temp = "";
        var kode_akun_temp = "";
        var aksi = "";

//        $('.ma').attr('class', 'ma active');
//        $('.ma .ta').attr('class', 'ma current-page');
//        $('.ma .child_menu').attr('style', 'display:block;');

        $('#kode-akun-upline').combotree('setValue', '0');

        $("#kode-akun").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 13, 9]) !== -1 || ((e.keyCode === 65 || e.keyCode === 67 || e.keyCode === 86) && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            }

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }

            kode_temp = $(this).val();
        });

        $("#kode-akun").on('input', function () {
            if (isNaN($(this).val()) || $(this).val().length > 8) {
                $(this).val(kode_temp);
            }
        });

        $("#nama-akun").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 13, 32, 9, 37, 39]) !== -1 || ((e.keyCode === 65 || e.keyCode === 67 || e.keyCode === 86) && (e.ctrlKey === true || e.metaKey === true))) {
                return;
            }

            if ((e.keyCode < 65 || e.keyCode > 90)) {
                e.preventDefault();
            }
        });

        $("#nama-akun").on('input', function () {
            var v = $(this).val();
            var data_regex = /[^A-Za-z ]/g;
            
            if(v.length > 64){
                $(this).val(v.substring(0, 64));
            }else if (data_regex.test(v) || v.indexOf("'") >= 0 || v.indexOf('"') >= 0) {
                v = v.replace(data_regex, '');
                v = v.replace("'", '');
                v = v.replace('"', '');
                $(this).val(v);
            }
        });

        $("#simpan-akun").click(function () {
            var kode_akun = $("#kode-akun").val();
            var nama_akun = $("#nama-akun").val();

            if (isEmpty(kode_akun) || isEmpty(nama_akun)) {
                notifikasi("<center>KODE DAN NAMA AKUN HARUS DIISI!</center>", "error", 1000);
                return false;
            } else {
                return true;
            }
        });


        $("#table-akun").treegrid({
            onClickCell: function (field, row) {
                if (field === 'edit') {
                    kode_akun_temp = row.id;
                    aksi = "ubah";
                    $(".bs-example-modal-sm .modal-body").text("");
                    $(".bs-example-modal-sm .modal-body").append("<input type='text' id='nama-akun-edit' class='form-control' value='" + row.text + "' />");
                    $(".bs-example-modal-sm").modal('show');
                } else if (field === 'delete') {
                    kode_akun_temp = row.id;
                    aksi = "hapus";
                    $(".bs-example-modal-sm .modal-body").text("");
                    $(".bs-example-modal-sm .modal-body").append("Hapus akun <strong>" + row.id + " - " + row.text + "</strong>?");
                    $(".bs-example-modal-sm").modal('show');
                }
            }
        });

        $(".bs-example-modal-sm").on('shown.bs.modal', function () {
            $("#nama-akun-edit").select();
        });

        $("#yes-button").click(function () {
            var nama_akun = $("#nama-akun-edit").val();

            if (aksi === 'ubah' && isEmpty(nama_akun)) {
                notifikasi("<center>NAMA AKUN HARUS DIISI!</center>", "error", 1000);
            } else {
                $.post('auto',
                        {
                            kode_akun: kode_akun_temp,
                            nama_akun: nama_akun,
                            aksi: aksi
                        },
                function (data, status) {
                    if (status === 'success') {
                        location.reload();
                    }
                });
            }
        });


    });
</script>