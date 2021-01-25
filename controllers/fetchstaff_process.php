<?php
    // Database connection info
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'filemanagementsystem_db'
    );

    // DB table to use
        $table = 'staff';
        // Table's primary key
        $primaryKey = 'StaffID';
        
        $columns = array(

        array(
                'db'  => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
                'dt'  => 0,
                'field' => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
                'formatter' => function($a1, $row ) {
                    
                    return '<a href="#">' . $a1 . '</a>';
                }
            ),

        array(
             'db'  => 'Division',
                'dt'  => 1,
                'field' => 'Division',
                'formatter' => function($a2, $row ) {
                    
                    return '<a href="#">' . $a2 . '</a>';
                }
            ),


        array( 'db' => 'StaffID', 'dt' => 2,'field' => 'StaffID',
                    'formatter' => function( $d, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                }),
         array( 'db' => 'StaffID', 'dt' => 3,'field' => 'StaffID',
                    'formatter' => function( $d1, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                })
          );

    $joinQuery = "FROM $table";

   require( '../StaffMember/scripts/ssp.class.php' );


    // Output data as json format
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery)
    );


