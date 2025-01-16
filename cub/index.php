<?php
include 'header.php';
?>
<main>
    <h1 class="not-printed">Planning de production</h1>
    <div class="row bg-light rounded-3 mb-3" style="font-size:14px;padding:15px;">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width:180px">Client</span>
                    <input type="text" class="form-control" id="filter_customer_name">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" style="width:190px">Date de liv prévisionnelle</span>
                    <input type="date" class="form-control" id="filter_order_date_start" 
                           value="<?php if (isset($_SESSION['filter_order_date'])) echo $_SESSION['filter_order_date']; ?>">

                </div>
            </div>
        </div>
        <div class="row md-3">
            <center>
                <input type="button" id="search_button" class="btn btn-primary" value="Rechercher">
            </center>
        </div>
    </div>
    <div  id="of_table"></div>
    <script>
        $(document).ready(function () {
            getOfs();
        });
        $('#search_button').click(function () {
            getOfs();
        });

        function getOfs() {
            $('#of_table').html('<center><img src="img/loading.gif" style="width:60px"></center>');
            $.ajax({
                url: "views/ofTable.php",
                data: {
                    filter_customer_name: $('#filter_customer_name').val()
                },
                success: function (result) {
                    $('#of_table').html(result);
                }
            });
        }
    </script>
</main>
<?php include 'footer.php';
?>