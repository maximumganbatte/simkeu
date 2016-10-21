<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-align-left"></i> Manejemen Akun <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('manajemen_akun/view') ?>">Tambah Akun</a></li>
                    <li><a href="<?= base_url('manajemen_akun/auto') ?>">Akun Otomatis</a></li>
                </ul>
            </li>                

            <li><a><i class="fa fa-file"></i> Jurnal <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('pengeluaran_kas/view') ?>">Pengeluaran Kas</a></li>
                </ul>
            </li>                


            <li class='satu'><a><i class="fa fa-hand-o-up"></i> Satu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class='coba'><a href="<?= base_url('satu/coba') ?>">Coba</a></li>
                    <li class='cobalagi'><a href="<?= base_url('satu/cobalagi') ?>">Coba Lagi</a></li>
                    <li class='cobaterus'><a href="<?= base_url('satu/cobaterus') ?>">Coba Terus</a></li>
                </ul>
            </li>                  
        </ul>
    </div>
</div>
