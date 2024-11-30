<!DOCTYPE html

    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

    <title></title>

    <style type="text/css">

    body {

        font-family: Arial;

        font-size: 10pt;

    }



    table {

        border: 1px solid #ccc;

        border-collapse: collapse;

    }



    table th {

        background-color: #F7F7F7;

        color: #333;

        font-weight: bold;

    }



    table th,

    table td {

        width: 100px;

        padding: 5px;

        border: 1px solid #ccc;

    }



    .selected {

        background-color: #666;

        color: #fff;

    }

    </style>

</head>



<body>

    <table id="tblLocations" cellpadding="0" cellspacing="0" border="1">

        <tr>

            <th>ID </th>

            <th>Location</th>

            <th>Preference</th>

        </tr>

        <tr>

            <td>1</td>

            <td> Goa</td>

            <td>1</td>

        </tr>

        <tr>

            <td>2</td>

            <td>Mahabaleshwar</td>

            <td>2</td>

        </tr>

        <tr>

            <td>3</td>

            <td>Kerala</td>

            <td>3</td>

        </tr>



    </table>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link rel="stylesheet"

        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js">

    </script>

    <script type="text/javascript">

    $(function() {

        $("#tblLocations").sortable({

            items: 'tr:not(tr:first-child)',

            cursor: 'pointer',

            axis: 'y',

            dropOnEmpty: false,

            start: function(e, ui) {

                ui.item.addClass("selected");



                console.log(e);

                console.log(ui);

            },

            stop: function(e, ui) {

                console.log(e);

                console.log(ui);

                ui.item.removeClass("selected");

                $(this).find("tr").each(function(index) {

                    if (index > 0) {



                        console.log(e);

                        console.log(ui);

                        console.log(index);

                        $(this).find("td").eq(2).html(index);

                    }

                });

            }

        });

    });

    </script>

</body>



</html>