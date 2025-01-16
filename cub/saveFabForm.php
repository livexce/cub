<?php

require_once('lib/db.php');

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'DIGI-ONE';

$idFabForm = $_POST['inputIdFabForm'];
if (!$idFabForm)
    $idFabForm = db::createEmptyFabForm();


$currentfabForm = db::getFabForm($idFabForm);
$error = "";

if ($currentfabForm['id_order'] != $_POST['inputIdOrder'])
    db::updateFieldfabForm($idFabForm , 'id_order', $_POST['inputIdOrder'], 'varchar', $currentfabForm['id_order']);

if ($currentfabForm['shipping_date'] != $_POST['inputOrderDateshipping'])
    db::updateFieldfabForm($idFabForm , 'shipping_date', $_POST['inputOrderDateshipping'], 'varchar', $currentfabForm['shipping_date']);

if ($currentfabForm['removal_date'] != $_POST['inputOrderDateSremoval'])
    db::updateFieldfabForm($idFabForm , 'removal_date', $_POST['inputOrderDateSremoval'], 'varchar', $currentfabForm['removal_date']);
if ($currentfabForm['removal_date'] != $_POST['inputOrderDateSremoval'])
    db::updateFieldfabForm($idFabForm , 'removal_date', $_POST['inputOrderDateSremoval'], 'varchar', $currentfabForm['removal_date']);

if ($currentfabForm['reference'] != $_POST['inputReference'])
    db::updateFieldfabForm($idFabForm , 'reference', $_POST['inputReference'], 'varchar', $currentfabForm['reference']);

if ($currentfabForm['retrait'] != $_POST['inputenlev'])
    db::updateFieldfabForm($idFabForm , 'retrait', $_POST['inputenlev'], 'varchar', $currentfabForm['retrait']);

if ($currentfabForm['teint_ext_type'] != $_POST['inputTeintTypeExt'])
    db::updateFieldfabForm($idFabForm , 'teint_ext_type', $_POST['inputTeintTypeExt'], 'varchar', $currentfabForm['teint_ext_type']);

if ($currentfabForm['teint_ext_code'] != $_POST['inputTeintCodeExt'])
    db::updateFieldfabForm($idFabForm , 'teint_ext_code', $_POST['inputTeintCodeExt'], 'varchar', $currentfabForm['teint_ext_code']);

if ($currentfabForm['teint_ext_text1'] != $_POST['inputTeintText1Ext'])
    db::updateFieldfabForm($idFabForm , 'teint_ext_text1', $_POST['inputTeintText1Ext'], 'varchar', $currentfabForm['teint_ext_text1']);

if ($currentfabForm['teint_ext_text2'] != $_POST['inputTeintText2Ext'])
    db::updateFieldfabForm($idFabForm , 'teint_ext_text2', $_POST['inputTeintText2Ext'], 'varchar', $currentfabForm['teint_ext_text2']);

if ($currentfabForm['teint_int_type'] != $_POST['inputTeintTypeInt'])
    db::updateFieldfabForm($idFabForm , 'teint_int_type', $_POST['inputTeintTypeInt'], 'varchar', $currentfabForm['teint_int_type']);

if ($currentfabForm['teint_int_code'] != $_POST['inputTeintCodeInt'])
    db::updateFieldfabForm($idFabForm , 'teint_int_code', $_POST['inputTeintCodeInt'], 'varchar', $currentfabForm['teint_int_code']);

if ($currentfabForm['teint_int_text1'] != $_POST['inputTeintText1Int'])
    db::updateFieldfabForm($idFabForm , 'teint_int_text1', $_POST['inputTeintText1Int'], 'varchar', $currentfabForm['teint_int_text1']);

if ($currentfabForm['teint_int_text2'] != $_POST['inputTeintText2Int'])
    db::updateFieldfabForm($idFabForm , 'teint_int_text2', $_POST['inputTeintText2Int'], 'varchar', $currentfabForm['teint_int_text2']);

if ($currentfabForm['rejointage'] != $_POST['inputRejointage'])
    db::updateFieldfabForm($idFabForm , 'rejointage', $_POST['inputRejointage'], 'varchar', $currentfabForm['rejointage']);

if ($currentfabForm['angles_inv'] != $_POST['inputAngles'])
    db::updateFieldfabForm($idFabForm , 'angles_inv', $_POST['inputAngles'], 'varchar', $currentfabForm['angles_inv']);

if ($currentfabForm['prepa'] != $_POST['inputPrepa'])
    db::updateFieldfabForm($idFabForm , 'prepa', $_POST['inputPrepa'], 'varchar', $currentfabForm['prepa']);

if ($currentfabForm['emballage'] != $_POST['inputEmbal'])
    db::updateFieldfabForm($idFabForm , 'emballage', $_POST['inputEmbal'], 'varchar', $currentfabForm['emballage']);

if ($currentfabForm['comment'] != $_POST['inputComment'])
    db::updateFieldfabForm($idFabForm , 'comment', $_POST['inputComment'], 'varchar', $currentfabForm['comment']);

if ($currentfabForm['status'] != $_POST['id_status'])
    db::updateFieldfabForm($idFabForm , 'status', $_POST['id_status'], 'varchar', $currentfabForm['status']);

if ($currentfabForm['sfab'] != $_POST['id_sfab'])
    db::updateFieldfabForm($idFabForm , 'sfab', $_POST['id_sfab'], 'varchar', $currentfabForm['sfab']);

if ($currentfabForm['semb'] != $_POST['id_semb'])
    db::updateFieldfabForm($idFabForm , 'semb', $_POST['id_semb'], 'varchar', $currentfabForm['semb']);

if ($currentfabForm['dormant_cde'] != $_POST['inputDormant'])
    db::updateFieldfabForm($idFabForm , 'dormant_cde', $_POST['inputDormant'], 'varchar', $currentfabForm['dormant_cde']);

if ($currentfabForm['dormant_liv'] != $_POST['inputDormant1'])
    db::updateFieldfabForm($idFabForm , 'dormant_liv', $_POST['inputDormant1'], 'varchar', $currentfabForm['dormant_liv']);

if ($currentfabForm['dormant_fin'] != $_POST['inputDormant2'])
    db::updateFieldfabForm($idFabForm , 'dormant_fin', $_POST['inputDormant2'], 'varchar', $currentfabForm['dormant_fin']);

if ($currentfabForm['ouvrant_cde'] != $_POST['inputOuvrant'])
    db::updateFieldfabForm($idFabForm , 'ouvrant_cde', $_POST['inputOuvrant'], 'varchar', $currentfabForm['ouvrant_cde']);

if ($currentfabForm['ouvrant_liv'] != $_POST['inputOuvrant1'])
    db::updateFieldfabForm($idFabForm , 'ouvrant_liv', $_POST['inputOuvrant1'], 'varchar', $currentfabForm['ouvrant_liv']);

if ($currentfabForm['ouvrant_fin'] != $_POST['inputOuvrant2'])
    db::updateFieldfabForm($idFabForm , 'ouvrant_fin', $_POST['inputOuvrant2'], 'varchar', $currentfabForm['ouvrant_fin']);

if ($currentfabForm['ouvrant_rema'] != $_POST['inputouvrant3'])
    db::updateFieldfabForm($idFabForm , 'ouvrant_rema', $_POST['inputOuvrant3'], 'varchar', $currentfabForm['ouvrant_rema']);

if ($currentfabForm['pareclose_cde'] != $_POST['inputPareclose'])
    db::updateFieldfabForm($idFabForm , 'pareclose_cde', $_POST['inputPareclose'], 'varchar', $currentfabForm['pareclose_cde']);

if ($currentfabForm['pareclose_liv'] != $_POST['inputPareclose1'])
    db::updateFieldfabForm($idFabForm , 'pareclose_liv', $_POST['inputPareclose1'], 'varchar', $currentfabForm['pareclose_liv']);

if ($currentfabForm['pareclose_fin'] != $_POST['inputPareclose2'])
    db::updateFieldfabForm($idFabForm , 'pareclose_fin', $_POST['inputPareclose2'], 'varchar', $currentfabForm['pareclose_fin']);

if ($currentfabForm['pareclose_rema'] != $_POST['inputPareclose3'])
    db::updateFieldfabForm($idFabForm , 'pareclose_rema', $_POST['inputPareclose3'], 'varchar', $currentfabForm['pareclose_rema']);

if ($currentfabForm['rejet_cde'] != $_POST['inputRejet'])
    db::updateFieldfabForm($idFabForm , 'rejet_cde', $_POST['inputRejet'], 'varchar', $currentfabForm['rejet_cde']);

if ($currentfabForm['rejet_liv'] != $_POST['inputRejet1'])
    db::updateFieldfabForm($idFabForm , 'rejet_liv', $_POST['inputRejet1'], 'varchar', $currentfabForm['rejet_liv']);

if ($currentfabForm['rejet_fin'] != $_POST['inputRejet2'])
    db::updateFieldfabForm($idFabForm , 'rejet_fin', $_POST['inputRejet2'], 'varchar', $currentfabForm['rejet_fin']);

if ($currentfabForm['rejet_rema'] != $_POST['inputRejet3'])
    db::updateFieldfabForm($idFabForm , 'rejet_rema', $_POST['inputRejet3'], 'varchar', $currentfabForm['rejet_rema']);

if ($currentfabForm['Piece_cde'] != $_POST['inputPiece'])
    db::updateFieldfabForm($idFabForm , 'Piece_cde', $_POST['inputPiece'], 'varchar', $currentfabForm['Piece_cde']);



header('Location: fabForm.php?id_fab_form=' . $idFabForm);
exit;