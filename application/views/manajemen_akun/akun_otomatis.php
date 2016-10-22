<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Akun Otomatis <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!--<form class="form-horizontal form-label-left" method="POST" action="">-->
                <fieldset class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Transaksi
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" id="nama-transaksi" class="form-control col-md-7 col-xs-12 input-text16" maxlength="16" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Debet</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" id="nama-debet" class="form-control col-md-7 col-xs-12 input-text16" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input id="kode-akun-debet" class="easyui-combotree" data-options="url:'dataakun_mct',method:'get',lines:true,multiple:true,cascadeCheck:false,prompt:'Pilih Akun Debet..'" style="width: 100%" editable="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kredit</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" id="nama-kredit" class="form-control col-md-7 col-xs-12 input-text16">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input id="kode-akun-kredit"  class="easyui-combotree" data-options="url:'dataakun_mct',method:'get',lines:true,multiple:true,cascadeCheck:false,prompt:'Pilih Akun Kredit..'" style="width: 100%" editable="true">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" id="simpan-akun-otomatis">Simpan</button>
                        </div>
                    </div>
                    <!--</form>-->
                </fieldset>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Akun Otomatis<small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="table-akun" class ="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trx_auto as $val) { ?>
                            <tr id="<?= $val->id ?>">
                                <td class="nama"><?= $val->nama ?></td>
                                <td id="<?= $trx_auto_jenis[$val->id]['D']['id_trx_auto_jenis'] ?>" class="td-id"><span class="nama-debet"><?= $trx_auto_jenis[$val->id]['D']['nama'] ?></span><br/><input class="easyui-combotree kode-akun-list" data-options="url:'dataakun_mct',method:'get',lines:true,multiple:true,cascadeCheck:false,prompt:'Pilih Akun Debet..'" value="<?= $trx_auto_jenis[$val->id]['D']['kode_akun'] ?>" editable="true"></td>
                                <td id="<?= $trx_auto_jenis[$val->id]['K']['id_trx_auto_jenis'] ?>" class="td-id" ><span class="nama-kredit"><?= $trx_auto_jenis[$val->id]['K']['nama'] ?></span><br/><input class="easyui-combotree kode-akun-list" data-options="url:'dataakun_mct',method:'get',lines:true,multiple:true,cascadeCheck:false,prompt:'Pilih Akun Kredit..'" value="<?= $trx_auto_jenis[$val->id]['K']['kode_akun'] ?>" editable="true"></td>
                                <td>
                                    <button type="submit" class="btn btn-round btn-warning edit-trx-auto"><i class="fa fa-pencil"></i></button> 
                                    <button type="submit" class="btn btn-round btn-danger delete-trx-auto"><i class="fa fa-close"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
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

        var id_trx_auto;
        var id_trx_auto_jenis;
        var aksi;

        $(".textbox.combo").attr('style','width:100%;');

        $(".input-text16").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 13, 32, 9, 37, 39]) !== -1 || ((e.keyCode === 65 || e.keyCode === 67 || e.keyCode === 86) && (e.ctrlKey === true || e.metaKey === true))) {
                return;
            }

            if ((e.keyCode < 65 || e.keyCode > 90)) {
                e.preventDefault();
            }
        });


//        $('.kode-akun-debet-list').combotree('setValues', '21000000,11010000');

        $(".input-text16").on('input', function () {
            var v = $(this).val();
            var data_regex = /[^A-Za-z ]/g;

            if (v.length > 16) {
                $(this).val(v.substring(0, 16));
            } else if (data_regex.test(v) || v.indexOf("'") >= 0 || v.indexOf('"') >= 0) {
                v = v.replace(data_regex, '');
                v = v.replace("'", '');
                v = v.replace('"', '');
                $(this).val(v);
            }
        });

        $(document).on('mouseover', '.td-id', function () {
            id_trx_auto_jenis = $(this).attr('id');
        });

        $(".kode-akun-list").combotree({
            onCheck: function (node, checked) {
                var kode_akun = node.id;
                var aksi = checked ? "tambah" : "hapus";
                $.post('auto',
                        {
                            id_trx_auto_jenis: id_trx_auto_jenis,
                            kode_akun: kode_akun,
                            aksi: aksi
                        },
                function (data, status) {
                });
//                alert(id_trx_auto_jenis + " - " + node.id + " - " + checked);
            }
        });

        $('.edit-trx-auto').click(function () {
            aksi = "ubah";
            id_trx_auto = $(this).parent().parent().attr('id');
            $(".bs-example-modal-sm .modal-body").text("");
            $(".bs-example-modal-sm .modal-body").append("" +
                    "Nama Transaksi <input type='text' id='nama-trx-auto' class='form-control' value='" + $('#' + id_trx_auto + ' .nama').text() + "' /><br/>" +
                    "Nama Debet <input type='text' id='nama-debet-trx-auto' class='form-control' value='" + $('#' + id_trx_auto + ' .nama-debet').text() + "' /><br/>" +
                    "Nama Kredit <input type='text' id='nama-kredit-trx-auto' class='form-control' value='" + $('#' + id_trx_auto + ' .nama-kredit').text() + "' />" +
                    "");
            $(".bs-example-modal-sm").modal('show');
        });

        $('.delete-trx-auto').click(function () {
            aksi = "hapus";
            id_trx_auto = $(this).parent().parent().attr('id');
            $(".bs-example-modal-sm .modal-body").text("");
            $(".bs-example-modal-sm .modal-body").append("Hapus transaksi <strong>" + $('#' + id_trx_auto + ' .nama').text() + "</strong>?");
            $(".bs-example-modal-sm").modal('show');
        });
        
        $("#yes-button").click(function () {
            var nama_trx_auto = $("#nama-trx-auto").val();
            var nama_debet_trx_auto = $("#nama-debet-trx-auto").val();
            var nama_kredit_trx_auto = $("#nama-kredit-trx-auto").val();

            if (aksi === 'ubah' && isEmpty(nama_trx_auto) && isEmpty(nama_debet_trx_auto) && isEmpty(nama_kredit_trx_auto)) {
                notifikasi("<center>NAMA TRANSAKSI, DEBET, DAN KREDIT HARUS DIISI!</center>", "error", 1000);
            } else {
                $.post('auto',
                        {
                            id_trx_auto: id_trx_auto,
                            nama_transaksi: nama_trx_auto,
                            nama_debet: nama_debet_trx_auto,
                            nama_kredit: nama_kredit_trx_auto,
                            aksi: aksi
                        },
                function (data, status) {
                    if (status === 'success') {
                        location.reload();
                    }
                });
            }
        });

        $("#simpan-akun-otomatis").click(function () {
            var nama_transaksi = $('#nama-transaksi').val();
            var nama_debet = $('#nama-debet').val();
            var kode_akun_debet = String($('#kode-akun-debet').combotree('getValues'));
            var nama_kredit = $('#nama-kredit').val();
            var kode_akun_kredit = String($('#kode-akun-kredit').combotree('getValues'));

            if (isEmpty(nama_transaksi) || isEmpty(nama_debet) || isEmpty(nama_kredit) || isEmpty(kode_akun_debet) || isEmpty(kode_akun_kredit)) {
                notifikasi("<center>SEMUA FIELD HARUS DIISI!</center>", "error", 1000);
            } else {
                $.post('auto',
                        {
                            nama_transaksi: nama_transaksi,
                            nama_debet: nama_debet,
                            kode_akun_debet: kode_akun_debet,
                            nama_kredit: nama_kredit,
                            kode_akun_kredit: kode_akun_kredit,
                            aksi: "tambah"
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

