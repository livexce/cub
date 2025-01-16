<?php

session_start();

require_once('db.php');
require_once('tools.php');

switch ($_GET['function']) {
    case 'addItemElement':
        db::addItemElement($_GET['id_item'], $_GET['id_element'], $_GET['value']);
        break;
    case 'updateShippingComment':
        db::updateShippingComment($_GET['id_order'], $_GET['shipping_comment']);
        break;
    case 'addParamTeintType':
        db::addParamTeintType($_GET['value']);
        break;
    case 'deleteParamTeintType':
        db::deleteParamTeintType($_GET['id']);
        break;
    case 'addParamPrepa':
        db::addParamPrepa($_GET['value']);
        break;
    case 'deleteParamPrepa':
        db::deleteParamPrepa($_GET['id']);
        break;
    case 'addParamTeintCode':
        db::addParamTeintCode($_GET['value']);
        break;
    case 'deleteParamTeintCode':
        db::deleteParamTeintCode($_GET['id']);
        break;
    case 'addParamTeintText1':
        db::addParamTeintText1($_GET['value']);
        break;
    case 'deleteParamTeintText1':
        db::deleteParamTeintText1($_GET['id']);
        break;
    case 'addParamTeintText2':
        db::addParamTeintText2($_GET['value']);
        break;
    case 'deleteParamTeintText2':
        db::deleteParamTeintText2($_GET['id']);
        break;
    case 'addParamEmbal':
        db::addParamEmbal($_GET['value']);
        break;
    case 'deleteParamEmbal':
        db::deleteParamEmbal($_GET['id']);
        break;
}
  
