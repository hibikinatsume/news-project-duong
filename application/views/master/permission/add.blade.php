<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 19/03/2019
 * Time: 16:38
 */
?>
@extends('master.layouts.main')
@section('header')
    Quản lý phân quyền
@endsection
@section('title')
    Thêm phân quyền
@endsection
@section('lead')
    Trang hiển thị form thêm phân quyền
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Thêm phân quyền</h4></div>

        <div class="card-body">
            <form method="POST" action="<?= base_url('index.php/permission/add_per') ?>">
                <div class="form-group">
                    <label for="last_name">Vai trò </label>
                    <input id="last_name" type="text" class="form-control" name="txtName">
                </div>

                <div class="form-group">
                    <label for="email">User</label>
                    <select class="form-control js-example-basic-multiple" name="users[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">News</label>
                    <select class="form-control js-example-basic-multiple" name="news[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Permission</label>
                    <select class="form-control js-example-basic-multiple" name="permission[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Category</label>
                    <select class="form-control js-example-basic-multiple" name="category[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Comments</label>
                    <select class="form-control js-example-basic-multiple" name="comments[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg btn-block" style="width: 30%; margin: auto" value="Thêm phân quyền">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Chọn phân quyền"
            });
        });
    </script>

@endsection
