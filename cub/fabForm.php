<?php
include 'header.php';
$ofs = db::getOfs($_GET['filter_customer_name']);

$paramTeintTypes = db::getParamTeintTypes();
$paramTeintCodes = db::getParamTeintCodes();
$paramTeintText1s = db::getParamTeintText1s();
$paramTeintText2s = db::getParamTeintText2s();
$paramPrepas = db::getParamPrepas();
$paramEmbals = db::getParamEmbals();
$status = db::getStatus();
$sfabs = db::getSfabs();
$sembs = db::getSEmbs();
//Récupérer l'id depuis l'URL http://localhost/cub/fabForm.php?id_fab_form=1
$idFabForm = $_GET['id_fab_form'];

$elements = db::getElementsForFabForm($idFabForm);

if ($idFabForm) {
    $fabForm = db::getFabForm($idFabForm);
}
if ($fabForm['id_customer']) {
    $customer = db::getCustomer($fabForm['id_customer']);
}


//var_dump($fabForm);
//exit;
?>
<main>
    <form method="post" action="saveFabForm.php" enctype="multipart/form-data" id="orderForm">
        <div class="container">
            <?php if ($idFabForm) { ?>
                <h1>Dossier n°<?php echo $fabForm['id_fab_form'] ?></h1>
            <?php } else { ?>
                <h1>Création d'un nouveau dossier</h1>
            <?php } ?>
            <div class="col-lg-12 mx-auto" style="padding-top:10px">
                <div class="row bg-light rounded-3" id="order_list" style="font-size:14px;padding:15px;margin:0 15px">
                    <h2>Client</h2><hr>
                    <div class="col-6">
                        <input type="hidden" class="form-control" name="inputIdFabForm" value="<?php echo $idFabForm ?>">
                        <input type="hidden" class="form-control" name="inputIdCustomer" id="inputIdCustomer" value="<?php echo $customer['id_customer'] ?>">
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:180px">Code</span>
                            <input type="text" class="form-control" id="inputCustomerCode" value="<?php echo $customer['code'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:180px">Nom</span>
                            <input type="text" class="form-control" id="inputCustomerName" id="filter_customer_name" value="<?php echo $customer['name'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:180px">Téléphone</span>
                            <input type="text" class="form-control" id="inputCustomerPhone" value="<?php echo $customer['phone'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:180px">Email</span>
                            <input type="text" class="form-control" id="inputCustomerEmail" name="inputCustomerEmail" value="<?php echo $customer['email'] ?>">
                        </div>
                    </div>
                    <div class="col-6"> 
                        <div class="input-group mb-2">
                            <input type="text" id="search_customer" class="form-control" placeholder="Rechercher">
                        </div>
                        <div id="customer_table"></div>
                    </div>
                </div>
            </div>



            <div class="col-lg-12 mx-auto" style="padding-top:10px">
                <div class="row bg-light rounded-3" id="order_list" style="font-size:14px;padding:15px;margin:0 15px">
                    <div class="col-6">
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:200px">Date de liv prévisionnelle</span>
                            <input type="date" class="form-control" id="inputOrderDateshipping" name="inputOrderDateshipping" value="<?php echo $fabForm['shipping_date'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:200px">Date d'enlévement</span>
                            <input type="date" class="form-control" id="inputOrderDateSremoval" name="inputOrderDateSremoval" value="<?php echo $fabForm['removal_date'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:200px">Enlèvement</span>
                            <input type="text" class="form-control" id="inputenlev" name="inputenlev" value="<?php echo $fabForm['retrait'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:200px">SFab</span>
                            <select class="form-select" name="id_sfab">
                                <option value=""></option>
                                <?php foreach ($sfabs as $sfab) { ?>
                                    <option value="<?php echo $sfab['value'] ?>"<?php if ($fabForm['sfab'] == $sfab['value']) echo "selected" ?>><?php echo $sfab['value'] ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:150px">N°cde</span>
                            <input type="text" class="form-control" id="inputIdOrder" name="inputIdOrder" value="<?php echo $fabForm['id_order'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:150px">Ref</span>
                            <input type="text" class="form-control" id="inputReference" name="inputReference" value="<?php echo $fabForm['reference'] ?>">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:150px">Status</span>
                            <select class="form-select" name="id_status">
                                <option value=""></option>
                                <?php foreach ($status as $status) { ?>
                                    <option value="<?php echo $status['value'] ?>"<?php if ($fabForm['status'] == $status['value']) echo "selected" ?>><?php echo $status['value'] ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="width:150px">SEmb</span>
                            <select class="form-select" name="id_semb">
                                <option value=""></option>
                                <?php foreach ($sembs as $semb) { ?>
                                    <option value="<?php echo $semb['value'] ?>"<?php if ($fabForm['semb'] == $semb['value']) echo "selected" ?>><?php echo $semb['value'] ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mx-auto" style="padding-top:10px">
                <div class="row bg-light rounded-3" id="order_list" style="font-size:14px;padding:15px;margin:0 15px">
                    <h2>Spécificité</h2><hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Teinte EXT</span>
                                <select class="form-select" name="inputTeintTypeExt">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintTypes as $paramTeintType) { ?>
                                        <option value="<?php echo $paramTeintType['value'] ?>" <?php if ($paramTeintType['value'] == $fabForm['teint_ext_type']) echo 'selected' ?>><?php echo $paramTeintType['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <select class="form-select" name="inputTeintCodeExt">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintCodes as $paramTeintCode) { ?>
                                        <option value="<?php echo $paramTeintCode['value'] ?>"<?php if ($paramTeintCode['value'] == $fabForm['teint_ext_code']) echo 'selected' ?> ><?php echo $paramTeintCode['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <select class="form-select" name="inputTeintText1Ext">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintText1s as $paramTeintText1) { ?>
                                        <option value="<?php echo $paramTeintText1['value'] ?>"<?php if ($paramTeintText1['value'] == $fabForm['teint_ext_text1']) echo 'selected' ?>><?php echo $paramTeintText1['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <select class="form-select" name="inputTeintText2Ext">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintText2s as $paramTeintText2) { ?>
                                        <option value="<?php echo $paramTeintText2['value'] ?>"<?php if ($paramTeintText2['value'] == $fabForm['teint_ext_text2']) echo 'selected' ?>><?php echo $paramTeintText2['value'] ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Teinte INT</span>
                                <select class="form-select" name="inputTeintTypeInt">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintTypes as $paramTeintType) { ?>
                                        <option value="<?php echo $paramTeintType['value'] ?>"<?php if ($paramTeintType['value'] == $fabForm['teint_int_type']) echo 'selected' ?>><?php echo $paramTeintType['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <select class="form-select" name="inputTeintCodeInt">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintCodes as $paramTeintCode) { ?>
                                        <option value="<?php echo $paramTeintCode['value'] ?>"<?php if ($paramTeintCode['value'] == $fabForm['teint_int_code']) echo 'selected' ?>><?php echo $paramTeintCode['value'] ?></option>
                                    <?php } ?>
                                </select>
                                <select class="form-select" name="inputTeintText1Int">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintText1s as $paramTeintText1) { ?>
                                        <option value="<?php echo $paramTeintText1['value'] ?>"<?php if ($paramTeintText1['value'] == $fabForm['teint_int_text1']) echo 'selected' ?>><?php echo $paramTeintText1['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <select class="form-select" name="inputTeintText2Int">
                                    <option value=""></option>
                                    <?php foreach ($paramTeintText2s as $paramTeintText2) { ?>
                                        <option value="<?php echo $paramTeintText2['value'] ?>"<?php if ($paramTeintText2['value'] == $fabForm['teint_int_text2']) echo 'selected' ?>><?php echo $paramTeintText2['value'] ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Rejointage</span>
                                <select class="form-select" name="inputRejointage">
                                    <option value="Oui" <?php if ($fabForm['rejointage'] == 'Oui') echo "selected" ?>>Oui</option>
                                    <option value="Non" <?php if ($fabForm['rejointage'] == 'Non') echo "selected" ?>>Non</option>
                                </select>
                            </div>     
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">ANGLES INV</span>
                                <select class="form-select" name="inputAngles">
                                    <option value="Oui" <?php if ($fabForm['angles_inv'] == 'Oui') echo "selected" ?>>Oui</option>
                                    <option value="Non" <?php if ($fabForm['angles_inv'] == 'Non') echo "selected" ?>>Non</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Prépa</span>
                                <select class="form-select" name="inputPrepa">
                                    <option value=""></option>
                                    <?php foreach ($paramPrepas as $paramPrepa) { ?>
                                        <option value="<?php echo $paramPrepa['value'] ?>"<?php if ($paramPrepa['value'] == $fabForm['prepa']) echo 'selected' ?>><?php echo $paramPrepa['value'] ?></option>
                                    <?php } ?>
                                </select> 
                                <span class="input-group-text" style="width:200px">Emballage</span>
                                <select class="form-select" name="inputEmbal">
                                    <option value=""></option>
                                    <?php foreach ($paramEmbals as $paramEmbal) { ?>
                                        <option value="<?php echo $paramEmbal['value'] ?>"<?php if ($paramEmbal['value'] == $fabForm['emballage']) echo 'selected' ?>><?php echo $paramEmbal['value'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Accesoires</span>
                                <input type="text" class="form-control" id="inputacces" name="inputacces" value="<?php echo $order['inputprepa'] ?>">
                                <span class="input-group-text" style="width:200px">Carton</span>
                                <input type="text" class="form-control" id="inputcart" name="inputcart" value="<?php echo $order['inputcart'] ?>">
                                <span class="input-group-text" style="width:200px">Joint</span>
                                <input type="text" class="form-control" id="inputjoint" name="inputjoint" value="<?php echo $order['inputjoint'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">LS100Alu</span>
                                <input type="text" class="form-control" id="inputalu" name="inputalu" value="<?php echo $order['inputalu'] ?>">
                                <span class="input-group-text" style="width:200px">LS107Acier</span>
                                <input type="text" class="form-control" id="inputacier" name="inputacier" value="<?php echo $order['inputacier'] ?>">
                                <span class="input-group-text" style="width:200px">Ls105Bois</span>
                                <input type="text" class="form-control" id="inputbois" name="inputbois" value="<?php echo $order['inputbois'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="width:200px">Remarque</span>
                                <textarea class="form-control" rows="4" name="inputComment"><?php echo $fabForm['comment'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mx-auto" style="padding-top:10px">
                <div class="row bg-light rounded-3" id="order_list" style="font-size:14px;padding:15px;margin:0 15px">
                    <h2>Articles</h2><hr>
                    A faire (ref, nom, qté)
                </div>
            </div>
            <div class="col-lg-12 mx-auto" style="padding-top:10px">
                <div class="row bg-light rounded-3" id="order_list" style="font-size:14px;padding:15px;margin:0 15px">
                    <h2>Elements</h2><hr>
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">CDE</th>
                                <th scope="col">Livraison</th>
                                <th scope="col">Finition</th>
                                <th scope="col">Remarque</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($elements as $element) {
                                ?>
                                <tr>
                                    <td><?= $element['name'] ?></td>
                                    <td style="text-align:center"><?= $element['value'] ?></td>
                                    <td style="width:200px"><input class="form-control"  type="text"></td>
                                    <td style="width:200px"><input class="form-control"  type="text"></td>
                                    <td style="width:400px"><input class="form-control"  type="text"></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="" style="position: fixed;right: 0px;bottom: 20px;width: 100px;height: 100px;">
                <!--<button type="button" class="btn btn-secondary mb-2 material-icons" style="font-size:2.5rem">download</button>-->
                <button type="submit" class="btn btn-primary material-icons" style="font-size:2.5rem">save</button>
            </div>
    </form>
</main>
<script>
    $(document).ready(function () {
        getCustomers();
    });

    $("#search_customer").keyup(function () {
        getCustomers();
    });

    function getCustomers() {
        $('#customer_table').html('<center><img src="img/loading.gif" style="width:60px"></center>');
        $.ajax({
            url: "views/customerTable.php",
            data: {
                search_customer: $('#search_customer').val()
            },
            success: function (result) {
                $('#customer_table').html(result);
            }
        });
    }
</script>

<?php include 'footer.php';
?>
