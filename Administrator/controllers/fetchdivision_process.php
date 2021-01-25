<?php
    // Database connection info
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'filemanagementsystem_db'
    );

    // DB table to use
        $table = 'division';
        // Table's primary key
        $primaryKey = 'DivisionID';
        
        $columns = array(

        array(
             'db'  => 'DivisionName',
                'dt'  => 0,
                'field' => 'DivisionName',
                'formatter' => function($a1, $row ) {
                    
                    return '<a href="#">' . $a1 . '</a>';
                }
            ),

        array(
             'db'  => 'DivisionAccronym',
                'dt'  => 1,
                'field' => 'DivisionAccronym',
                'formatter' => function($a2, $row ) {
                    
                    return '<a href="#">' . $a2 . '</a>';
                }
            ),


        array( 'db' => 'DivisionID', 'dt' => 2,'field' => 'DivisionID',
                    'formatter' => function( $d, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                }),
         array( 'db' => 'DivisionID', 'dt' => 3,'field' => 'DivisionID',
                    'formatter' => function( $d1, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                })
          );

    $joinQuery = "FROM $table";

    require( '../Administrator/scripts/ssp.class.php' );

    // Output data as json format
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery)
    );


