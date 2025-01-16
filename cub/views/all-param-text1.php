<?php
require_once('../lib/db.php');
$paramTeintText1s = db::getParamTeintText1s();
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
        foreach ($paramTeintText1s as $paramTeintText1) {
            ?>
            <tr>
                <td><?php echo $paramTeintText1['value'] ?></td>
                <td><button data-id="<?php echo $paramTeintText1['id_param_teint_text_1'] ?>" class="btn btn-sm btn-danger delete">X</button></td>
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
                function: 'deleteParamTeintText1',
                id: $(this).attr('data-id')
            },
            success: function (result) {
                getParamTeintText1s();
            }
        });
    });
</script>