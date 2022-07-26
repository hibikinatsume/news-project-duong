@extends('master.layouts.main')
@section('header')
    Quản lý thông tin
@endsection
@section('title')
    Thông tin cá nhân
@endsection
@section('lead')
    Trang hiển thị thông tin cá nhân
@endsection
@section('content')
    <div class="card profile-widget">
        <div class="profile-widget-header">
            @if(isset($_SESSION['google']) && $_SESSION['google'] != 0)
                <img src="<?= $info->avatar ?>" class="rounded-circle mr-1" style="width: 200px; height: 200px;">
            @else
                <img alt="image" src="<?= base_url() ?>assets/upload_images/<?= $info->avatar ?>"
                     style="width: 200px; height: 200px;" class="rounded-circle profile-widget-picture">
            @endif
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Số bài viết</div>
                    <div class="profile-widget-item-value"><?= $info->news ?></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Bình luận</div>
                    <div class="profile-widget-item-value"><?= $info->comments ?></div>
                </div>
            </div>
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name"><?= $info->name ?>
                <div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> <?= $info->name_per ?></div>
            </div>
            <p><?= $info->introduce ?></p>
        </div>
        <div class="card-footer text-center">
            <a href="<?= base_url('index.php/users/view_edit_info/'.$info->id_user) ?>" class="btn btn-icon icon-left float-left" style="background-color: #34395e; color: #fff;"><i class="far fa-edit"></i>Cập nhật thông tin</a>
            @if($info->password != '')
            <a href="<?= base_url('index.php/users/view_pass/'.$info->id_user) ?>" class="btn btn-icon icon-left float-right" style="background-color: #34395e; color: #fff;"><i class="far fa-edit"></i>Đổi mật khẩu</a>
            @endif
        </div>
    </div>
@endsection

