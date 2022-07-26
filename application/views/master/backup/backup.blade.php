<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 17:00
 */
?>
@extends('master.layouts.main')
@section('header')
    Quản lý sao lưu
@endsection
@section('title')
    Thêm sao lưu
@endsection
@section('lead')
    Trang thêm sao lưu
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Sao lưu dữ liệu</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('index.php/index/backup')?>">
                <div class="form-group row mb-6">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tên file</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="name" class="form-control" name="txtName">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
        </div>

    </div>

@endsection
