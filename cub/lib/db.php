<?php

class db {

    const host = 'localhost';
    const dbName = 'cub';
    const user = 'cub';
    const password = 'Noeleni62**';

    /*     * ****************************************************************************** */
    /*     * ***********************************LOG************************************* */
    /*     * ****************************************************************************** */

    static function exec($sql) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->exec($sql);
        $error = 0;
        if ($req == false)
            self::addLog(addslashes($sql), 1);
        self::addLog(addslashes($sql), 0);
        $bdd = null;
        return $req;
    }

    static function addLog($request, $error) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $dateAdd = new DateTime();
        $dateAdd = $dateAdd->format('Y-m-d H:i:s');
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
        $userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'DIGI-ONE';
        $req = $bdd->exec("insert into log(request, user_name, date_add, error) values('" . $request . "', '" . $userName . "','" . $dateAdd . "', " . $error . ")");
        $req = $bdd->query("select max(id_log) as id_log from log");
        $data = $req->fetch();
        return $data['id_log'];
    }

    static function validateUser($email, $password) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from user  where email='" . $email . "' and password='" . $password . "'");
        return $req->fetch();
    }

    static function getUsers() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select *
                            from user ");
        return $req->fetchAll();
    }

    static function getFabForm($idFabForm) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from fab_form where id_fab_form=" . $idFabForm);
        return $req->fetch();
    }

    static function getCustomer($idCustomer) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from customer where id_customer=" . $idCustomer);
        return $req->fetch();
    }

    static function getOfs($customerName) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);

        $filter = "";
        if ($customerName) {
            $filter .= " and c.name like '%" . $customerName . "%'";
        }
        $sql = "SELECT *
                         FROM fab_form ff
                         INNER JOIN customer c USING(id_customer)
                         WHERE 1;
                             " . $filter . ";";

//        echo $sql;exit;

        $req = $bdd->query($sql);

        return $req->fetchAll();
    }

    static function getCustomers($customerName) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $filter = "";
        if ($customerName) {
            $filter .= " and c.name like '%" . $customerName . "%'";
        }
        $sql = "SELECT * 
                            FROM customer c 
                            WHERE 1
                            " . $filter . ";";

        $req = $bdd->query($sql);

        return $req->fetchAll();
    }

    static function getStatus() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `status` ");
        return $req->fetchAll();
    }

    static function getSfabs() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `sfab` ");
        return $req->fetchAll();
    }

    static function getSembs() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `semb` ");
        return $req->fetchAll();
    }

    static function getparamTeintTypes() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_teint_type` ");
        return $req->fetchAll();
    }

    static function addparamTeintType($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_teint_type(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteparamTeintType($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_teint_type where id_param_teint_type=" . $id;
        self::exec($sql);
        return 1;
    }

    static function getParamTeintCodes() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_teint_code` ");
        return $req->fetchAll();
    }

    static function addParamTeintCode($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_teint_code(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteParamTeintCode($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_teint_code where id_param_teint_code =" . $id;
        self::exec($sql);
        return 1;
    }

    static function getParamTeintText1s() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_teint_text_1` ");
        return $req->fetchAll();
    }

    static function addParamTeintText1($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_teint_text_1(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteParamTeintText1($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_teint_text_1 where id_param_teint_text_1 =" . $id;
        self::exec($sql);
        return 1;
    }

    static function getParamTeintText2s() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_teint_text_2` ");
        return $req->fetchAll();
    }

    static function addParamTeintText2($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_teint_text_2(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteParamTeintText2($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_teint_text_2 where id_param_teint_text_2 =" . $id;
        self::exec($sql);
        return 1;
    }

    static function getParamPrepas() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_prepa` ");
        return $req->fetchAll();
    }

    static function addParamPrepa($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_prepa(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteParamPrepa($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_prepa where id_param_prepa=" . $id;
        self::exec($sql);
        return 1;
    }

    static function getParamEmbals() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("SELECT * FROM `param_embal` ");
        return $req->fetchAll();
    }

    static function addParamEmbal($value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "insert into param_embal(value) values('" . $value . "')";
        self::exec($sql);
        return 1;
    }

    static function deleteParamEmbal($id) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from param_embal where id_param_embal =" . $id;
        self::exec($sql);
        return 1;
    }

    static function createEmptyFabForm() {
        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
        $userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'DIGI-ONE';
        $sql = "insert into fab_form(user_add) values('" . $userName . "')";
        $req = self::exec($sql);
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select max(id_fab_form) as id_fab_form from fab_form");
        $data = $req->fetch();
        return $data['id_fab_form'];
    }

    static function updateFieldfabForm($idFabForm, $field, $value, $type, $oldValue) {
        $oldValue = addslashes($oldValue);
        $value = addslashes($value);
        $sql = "";
        if ($type == 'varchar' || $type == 'datetime')
            $sql = "update fab_form set " . $field . " ='" . $value . "' where id_fab_form=" . $idFabForm;
        else
            $sql = "update fab_form set " . $field . " =" . $value . " where id_fab_form=" . $idFabForm;
        self::exec($sql);
//        self::addHistory($idFabForm, $field, $value, $oldValue);
        return 1;
    }

    static function getElements() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from element order by position asc");
        return $req->fetchAll();
    }

    static function getItems() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from item");
        return $req->fetchAll();
    }

    static function getItemsElements() {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $req = $bdd->query("select * from item_element");

        $itemsElements = $req->fetchAll();
        $result = array();

        foreach ($itemsElements as $itemElement)
            $result[$itemElement['id_item'] . '-' . $itemElement['id_element']] = $itemElement['value'];

        return $result;
    }

    static function addItemElement($idItem, $idElement, $value) {
        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);
        $sql = "delete from item_element where id_item=" . $idItem . " and id_element=" . $idElement;
        self::exec($sql);
        $sql = "insert into item_element (id_item, id_element,value)values(" . $idItem . "," . $idElement . "," . $value . ")";
        self::exec($sql);
    }

    static function getElementsForFabForm($idFabForm) {

        $bdd = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbName . ';charset=utf8', self::user, self::password);

        $sql = "SELECT e.id_element, e.name, sum(ie.value*ffi.quantity) as value
                from fab_form ff
                inner join fab_form_item ffi using(id_fab_form)
                inner join item_element ie using(id_item)
                inner join element e using(id_element)
                where id_fab_form=" . $idFabForm . "
                group by e.id_element
                order by position;";
        $req = $bdd->query($sql);

        return $req->fetchAll();
    }

}
