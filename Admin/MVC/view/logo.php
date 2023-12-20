<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <h3 class="func_title">Quản lí logo</h3>
    <form action="index.php?act=logo_manage&id=edit_logo" method="post" enctype="multipart/form-data">
    <table class="table_manage">
        <tr>
            <th class="text_center col-50">Logo</th>
            <th class="text_center col-50">Đổi logo</th>
        </tr>
        <tr>
            <td class="text_center">
                <img style="width: 50px; height: 50px;" src="./<?php getLogo($conn); ?>" alt="logo">
            </td>
            <td>
                <input type="file" name="file" accept="image/*" required>
            </td>
            <td>
                <input name="submit" class="edit_btn" type="submit" value="ĐỔI">
            </td>
        </tr>
    </table>
    </form>
</div>