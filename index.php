<?php
require_once ("database/conexaoMySQL.php");
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title
        <script type=”text/javascript” src=”../js/jquery/jquery.js”></script>

        <script type=”text/javascript”>
    <!-- codigo de ler json -->

            alert("teste");

            $.getJSON("localhost/enqueteWS/salaService.php?idsala=all", function (data) {
                var items = [];
                $.each(data, function (key, val) {
                    items.push("<li id='" + key + "'>" + val + "</li>");
                });


                $("<ul/>", {
                    "class": "my-new-list",
                    html: items.join("")
                }).appendTo("body");
            });

        </script>
    </head>
    <body>
        <?php
        echo "hello world";
        $conexao = new Connection();

        $query = "SELECT * FROM  sala";
        $result = $conexao->Select($query);
        while ($obj = mysql_fetch_object($result)) {
            $id = $obj->nomesala;
            //echo $id;
        }

        $conexao->closeConnection();
        ?>
    </body>

</html>
