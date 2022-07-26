<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 17:14
 */
?>
@extends('master.layouts.main')
@section('header')
    Quản lý sao lưu
@endsection
@section('title')
    Sao lưu
@endsection
@section('lead')
    Bảng hiển thị danh sách sao lưu
@endsection
@section('content')
    <?php $arr = permission(); ?>
    <div class="card">
        <div class="card-header"><h4>Sao lưu</h4></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" style="text-align: center;">
                    <tr>
                        <th>#</th>
                        <th>Tên file</th>
                        <th>Ngày tạo</th>
                        <th width="18%" style="text-align:center">Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach($list as $key => $item)
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $item['path'] ?></td>
                            <td><?= $item['create_at'] ?></td>
                            <td style="text-align:center">
                                <a href="<?= base_url('index.php/index/restore/' . $item['path']) ?>" style="background-color: #E91E63" class="btn btn-icon" data-toggle='tooltip' data-placement='top' title='' data-original-title='Restore'><i class="fas fa-retweet"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
        </div>

    </div>

@endsection


