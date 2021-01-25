<?php
    // Database connection info
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'filemanagementsystem_db'
    );

    // DB table to use
        $table = 'folder';
        // Table's primary key
        $primaryKey = 'FolderID';
        
        $columns = array(

        array(
             'db'  => 'FolderName',
                'dt'  => 0,
                'field' => 'FolderName',
                'formatter' => function($a1, $row ) {
                    
                    return '<a href="#">' . substr($a1, 16,  -1) . '</a>';
                }
            ),

        array(
             'db'  => 'FolderName',
                'dt'  => 1,
                'field' => 'FolderName',
                'formatter' => function($a2, $row ) {
                    
                    return '<a href="#"><img src="../img/floder-close-128.png" width="25px" height="25px" > "C:\"' . $a2 . '</a>';
                }
            ),
       array(
             'db'  => 'Type',
                'dt'  => 2,
                'field' => 'Type',
                'formatter' => function($a3, $row ) {
                    
                    return '<a href="#">' . $a3 . '</a>';
                }
            ),

       array(
             'db'  => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
                'dt'  => 3,
                'field' => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
                'formatter' => function($a4, $row ) {
                    
                    return '<a href="#">' . $a4 . '</a>';
                }
            ),

        array( 'db' => 'FolderID', 'dt' => 5,'field' => 'FolderID',
                    'formatter' => function( $d, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                }),
         array( 'db' => 'FolderID', 'dt' => 5,'field' => 'FolderID',
                    'formatter' => function( $d1, $row ) {
                       return '';///Wag na ito pansinin di na ito kasama nag eerror lang ksi ang table kapag hindi ito sinama.
                })
          );

    $joinQuery = "FROM $table a INNER JOIN staff b ON a.StaffID = b.StaffID";

    require( '../Administrator/scripts/ssp.class.php' );

    // Output data as json format
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery)
    );


