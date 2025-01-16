<?php
require_once('../lib/db.php');
$paramTeintText2s = db::getParamTeintText2s();
//var_dump($paramTypeCodes);
//exit;
?>

<table class="table table-hover table-sm">
    <thead>
        <tr>
            <th scope="col">Code</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($paramTeintText2s as $paramTeintText2) {
            ?>
            <tr>
                <td><?php echo $paramTeintText2['value'] ?></td>
                <td><button data-id="<?php echo $paramTeintText2['id_param_teint_text_2'] ?>" class="btn btn-sm btn-danger delete">X</button></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
    $('.delete').click(function () {
        $.ajax({
            url: "lib/ajax.php",
            data: {
                function: 'deleteParamTeintText2',
                id: $(this).attr('data-id')
            },
            success: function (result) {
                getParamTeintText2s();
            }
        });
    });
</script>