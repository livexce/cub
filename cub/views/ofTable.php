<?php
include '../lib/db.php';
$ofs = db::getOfs($_GET['filter_customer_name']);
?>
<div class="row bg-light rounded-3" style="font-size:14px;padding:15px;">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>S Fab</th>
                        <th>S Emb</th>
                        <th>Date de liv prévisionnelle</th>
                        <th>Date de d'enlévement</th>
                        <th>N°cde</th>
                        <th>Ref</th>
                        <th>Teint Ext</th>
                        <th>Teint Int</th>
                        <th>Rejointage</th>
                        <th>Angles INV</th>
                        <th>Remarque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ofs as $of) {
                        ?>
                        <tr>
                            <td><?= $of['name'] ?></td> 
                            <td><?= $of['sfab'] ?></td> 
                            <td><?= $of['semb'] ?></td> 
                            <td><?= $of['shipping_date'] ?></td>
                            <td><?= $of['removal_date'] ?></td>
                            <td><?= $of['id_order'] ?></td>
                            <td><?= $of['reference'] ?></td>
                            <td><?= $of['teint_ext_type'] ?></td>
                            <td><?= $of['teint_int_type'] ?></td>
                            <td><?= $of['rejointage'] ?></td>
                            <td><?= $of['angles_inv'] ?></td>
                            <td><?= $of['comment'] ?></td>
                            <td style="text-align:right;" class="not-printed">
                                <a href="./fabForm.php?id_fab_form=<?= $of['id_fab_form'] ?>" class="btn btn-sm btn-primary material-icons" style="font-size:1rem">edit</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>


