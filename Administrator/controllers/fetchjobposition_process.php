<?php
    // Database connection info
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'filemanagementsystem_db'
    );

    // DB table to use
        $table = 'job_postion';
        // Table's primary key
        $primaryKey = 'JobID';
        
        $columns = array(

        array(
             'db'  => 'Position',
                'dt'  => 0,
                'field' => 'Position',
                'formatter' => function($a1, $row ) {
                    
                    return '<a href="#">' . $a1 . '</a>';
                }
            ),

        array(
             'db'  => 'Description',
                'dt'  => 1,
                'field' => 'Description',
                'formatter' => function($a2, $row ) {
                    
                    return '<a href="#">' . $a2 . '</a>';
                }
            ),


        array( 'db' => 'JobID', 'dt' => 2,'field' => 'JobID',
                    'formatter' => function( $d, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                }),
         array( 'db' => 'JobID', 'dt' => 3,'field' => 'JobID',
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


