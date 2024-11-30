<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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



    <table id="table-1" cellspacing="0" cellpadding="2">

        <tr id="1">

            <td>111</td>

            <td>One</td>

            <td>some text</td>

        </tr>

        <tr id="2">

            <td>222</td>

            <td>Two</td>

            <td>some text</td>

        </tr>

        <tr id="3">

            <td>333</td>

            <td>Three</td>

            <td>some text</td>

        </tr>

        <tr id="4">

            <td>444</td>

            <td>Four</td>

            <td>some text</td>

        </tr>

        <tr id="5">

            <td>555</td>

            <td>Five</td>

            <td>some text</td>

        </tr>

        <tr id="6">

            <td>666</td>

            <td>Six</td>

            <td>some text</td>

        </tr>

    </table>

    <hr>

    <div id='debugArea'></div>



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js">

    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>





    <script type="text/javascript">

        $(document).ready(function() {



            $("#table-1").tableDnD({

                onDragStart: function(table, row) {

                    console.log(table.rows);

                    $('#debugArea').html("Started dragging row " + row.id);

                },

                onDrop: function(table, row) {

                    //alert($.tableDnD.serialize());

                    //console.log($.tableDnD.serialize());

                    //console.log(table);

                    //console.log(row);



                    console.log(table.rows);



                    var rows = table.tBodies[0].rows;

                    var debugStr = "Row dropped was " + row.id + ". New order: ";



                    console.log(rows);



                    for (var i = 0; i < rows.length; i++) {

                        debugStr += rows[i].id + " ";

                        console.log($(this));

                        //console.log($(this).find("td").eq(1).html(i));

                    }

                    $('#debugArea').html(debugStr);





                }

            });



        });

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