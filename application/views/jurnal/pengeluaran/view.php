<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .right-align{
        text-align: right;
    }
    
    .center-align{
        text-align: center;
    }
</style>


<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pengeluaran Kas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Tanggal</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <br/><br/><br/>
                <div class="pull-right">Export :<a href="">PDF</a> <a href="">XLS</a></div>
                <div>Tambah Data : <a href="">Otomatis</a> <a href="">Manual</a> </div>
                <table id="table-akun" class ="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Tanggal</th>
                            <th>Keterangan</th>
                            <th>No Bukti</th>
                            <th>Kode Akun</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">Oktober 2016</td>
                            <td rowspan="2">10</td>
                            <td>Kas</td>
                            <td></td>
                            <td>11010000</td>
                            <td class="right-align">2.200.000</td>
                            <td></td>
                            <td rowspan="2"> v x</td>
                        </tr>
                        <tr>
                            <td>Pendapatan Non Terikat : UKT Prodi</td>
                            <td></td>
                            <td>41010000</td>
                            <td></td>
                            <td class="right-align">2.200.000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="center-align" colspan="5">Jumlah</th>
                            <td class="right-align">2.200.000</th>
                            <td class="right-align">2.200.000</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>