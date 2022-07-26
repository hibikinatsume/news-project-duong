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
    Cập nhật phân quyền
@endsection
@section('lead')
    Trang hiển thị form sửa phân quyền
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>Cập nhật phân quyền</h4></div>

        <div class="card-body">
            <form method="POST" action="<?= base_url('index.php/permission/edit_per/'.$role->id) ?>">
                <div class="form-group">
                    <label for="last_name">Vai trò </label>
                    <input id="last_name" type="text" class="form-control" name="txtName" value="<?= $role->name ?>">
                </div>

                <div class="form-group">
                    <label for="email">User</label>
                    <select class="form-control js-example-basic-multiple" name="users[]" multiple="multiple" style="width: 100%;">
                        <option value="0" @if(in_array('0',$role->users)) selected @endif>Tất cả </option>
                        <option value="1" @if(in_array('1',$role->users)) selected @endif>Xem </option>
                        <option value="2" @if(in_array('2',$role->users)) selected @endif>Thêm </option>
                        <option value="3" @if(in_array('3',$role->users)) selected @endif>Sửa </option>
                        <option value="4" @if(in_array('4',$role->users)) selected @endif>Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">News</label>
                    <select class="form-control js-example-basic-multiple" name="news[]" multiple="multiple" style="width: 100%;">
                        <option value="0" @if(in_array('0',$role->news)) selected @endif>Tất cả </option>
                        <option value="1" @if(in_array('1',$role->news)) selected @endif>Xem </option>
                        <option value="2" @if(in_array('2',$role->news)) selected @endif>Thêm </option>
                        <option value="3" @if(in_array('3',$role->news)) selected @endif>Sửa </option>
                        <option value="4" @if(in_array('4',$role->news)) selected @endif>Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Permission</label>
                    <select class="form-control js-example-basic-multiple" name="permission[]" multiple="multiple" style="width: 100%;">
                        <option value="0" @if(in_array('0',$role->permission)) selected @endif>Tất cả </option>
                        <option value="1" @if(in_array('1',$role->permission)) selected @endif>Xem </option>
                        <option value="2" @if(in_array('2',$role->permission)) selected @endif>Thêm </option>
                        <option value="3" @if(in_array('3',$role->permission)) selected @endif>Sửa </option>
                        <option value="4" @if(in_array('4',$role->permission)) selected @endif>Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Category</label>
                    <select class="form-control js-example-basic-multiple" name="category[]" multiple="multiple" style="width: 100%;">
                        <option value="0" @if(in_array('0',$role->category)) selected @endif>Tất cả </option>
                        <option value="1" @if(in_array('1',$role->category)) selected @endif>Xem </option>
                        <option value="2" @if(in_array('2',$role->category)) selected @endif>Thêm </option>
                        <option value="3" @if(in_array('3',$role->category)) selected @endif>Sửa </option>
                        <option value="4" @if(in_array('4',$role->category)) selected @endif>Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Comments</label>
                    <select class="form-control js-example-basic-multiple" name="comments[]" multiple="multiple" style="width: 100%;">
                        <option value="0" @if(in_array('0',$role->comments)) selected @endif>Tất cả </option>
                        <option value="1" @if(in_array('1',$role->comments)) selected @endif>Xem </option>
                        <option value="2" @if(in_array('2',$role->comments)) selected @endif>Thêm </option>
                        <option value="3" @if(in_array('3',$role->comments)) selected @endif>Sửa </option>
                        <option value="4" @if(in_array('4',$role->comments)) selected @endif>Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg btn-block" style="width: 30%; margin: auto" value="Cập nhật phân quyền">
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
