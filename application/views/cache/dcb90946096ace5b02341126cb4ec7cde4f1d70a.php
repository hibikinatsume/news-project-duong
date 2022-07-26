<?php /* C:\xampp\htdocs\articles\application\views/master/types/types.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 17:56
 */
?>

<?php $__env->startSection('header'); ?>
    Quản lý danh mục
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Danh sách danh mục
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang hiển thị danh sách danh mục
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
    $arr = permission();
    $per = $arr->category;
    function showCategories_type($type, $arr, $parent_id = null)
    {
        foreach ($type as $key => $item) {
            if ($item->id_parent == $parent_id) {
                echo "<tr class='treegrid-" . $item->id . " treegrid-parent-" . $item->id_parent . " text-dark' >";
                echo '<td style="border: 1px solid silver;">';
                echo '<span class="treegrid-expander"></span><b>' . $item->name;
                echo '</b></td>';
                if (in_array('0', $arr) || in_array('3', $arr) || in_array('4', $arr)) {
                    echo "<td style='width: 15%; text-align: center;border: 1px solid silver;'>";
                    if (in_array('0', $arr) || in_array('3', $arr)) {
                        echo "<a href='#' class='btn  mr-2 edit' data-toggle='modal' data-target='#modal-04' data-id='$item->id' style='background-color: #CDDC39; color: #fff!important;'><i class='fas fa-pencil-alt'></i></a>";
                    }
                    if (in_array('0', $arr) || in_array('4', $arr)) {
                        echo "<a href=" . base_url('index.php/types/remove_category/' . $item->id) . " class='btn' style='background-color: #E91E63 ; color: #fff!important;'><i class='fas fa-times'></i></a>";
                    }
                    echo "</td>";
                }
                echo '</tr>';
                unset($type[$key]);
                showCategories_type($type, $arr, $item->id);
            }
        }
    }
    function showCategories_select($categories, $parent_id = 0, $char = '&nbsp;')
    {
        foreach ($categories as $key => $item) {
            if ($item->id_parent == $parent_id) {
                echo '<option value="' . $item->id . '">';
                echo $char . $item->name;
                echo '</option>';
                unset($categories[$key]);
                showCategories_select($categories, $item->id, '&nbsp;&nbsp;&nbsp;' . $char . '&nbsp;');
            }
        }
    }
    ?>
    <div class="card">
        <div class="card-header">
            <h4>Danh mục</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-md" style="text-align: center;">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($value->name); ?></td>
                        <td width="18%">
                            <?php if(in_array('0',$arr->category) || in_array('3',$arr->category) || in_array('4',$arr->category)): ?>
                                <?php if(in_array('0',$arr->category) || in_array('3',$arr->category)): ?>
                                    <a href='#' class='btn btn-icon btn-success  mr-2 edit' data-toggle='modal' data-target='#modal-04' data-id='<?php echo e($value->id); ?>'><i class='fas fa-pencil-alt'></i> Sửa</a>
                                <?php endif; ?>
                                <?php if(in_array('0',$arr->category) || in_array('4',$arr->category)): ?>
                                     <a href=" <?php echo e(base_url('index.php/types/remove_category/' . $value->id)); ?> " class='btn btn-icon btn-danger'><i class='fas fa-times'></i> Xóa</a>
                                <?php endif; ?>
                            <?php else: ?>
                                Not action
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM DANH MỤC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAdd" method="post" action="<?= base_url('index.php/types/add_category') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên danh mục </label>
                            <input type="text" class="form-control" name="txtName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-success" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-04" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SỬA DANH MỤC </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEdit" method="post" action="<?= base_url('index.php/types/edit_category') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mã danh mục </label>
                            <input type="text" class="form-control" id="id" name="txtId" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tên danh mục </label>
                            <input type="text" class="form-control" id="name" name="txtName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-success" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.tree').treegrid();
    </script>
    <script>
        $(document).ready(function () {
            $('.edit').click(function () {
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('index.php/types/get_category_where') ?>",
                    dataType: 'json',
                    data: {id: id},
                    success: function (data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        let value_parent = (data.id_parent == null) ? 0 : data.id_parent;
                        $("#type").val(value_parent);
                    }
                })
            })
        });
        $(document).ready(function() {
            $("#formAdd").validate({
                rules: {
                    txtName: {
                        required: true,
                        remote: {
                            url: '<?= base_url() ?>index.php/index/check_category',
                            type: 'post',
                            async: false,
                            data: {id: ''}
                        }
                    }

                },
                messages: {
                    txtName: {
                        required: "Vui lòng nhập tên danh mục",
                        remote: "Tên danh mục đã tồn tại"
                    }
                }
            });
        });
        $(document).ready(function() {
            $("#formEdit").on("submit", function () {
                $(this).validate({
                    rules: {
                        txtName: {
                            required: true,
                            remote: {
                                url: '<?= base_url() ?>index.php/index/check_category_edit',
                                async: false,
                                data: {id:$('#id').val() }
                            }
                        }

                    },
                    messages: {
                        txtName: {
                            required: "Vui lòng nhập tên danh mục",
                            remote: "Tên danh mục đã tồn tại"
                        }
                    }
                });
                if(!$(this).valid()){
                    return false;
                }
            })

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>