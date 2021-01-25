<?php
    // Database connection info
    $dbDetails = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'filemanagementsystem_db'
    );

    // DB table to use
        $table = 'file';
        // Table's primary key
        $primaryKey = 'FileID';
        
        $columns = array(

        array(
             'db'  => 'FileName',
                'dt'  => 0,
                'field' => 'FileName',
                'formatter' => function($a1, $row ) {
                    
                    return '<a href="#">' . $a1 . '</a>';
                }
            ),

        array(
             'db'  => 'TagID',
                'dt'  => 1,
                'field' => 'TagID',
                'formatter' => function($a2, $row ) {
                    
                    return '<a href="#">' . $a2 . '</a>';
                }
            ),

        array(
             'db'  => 'FileDate',
                'dt'  => 2,
                'field' => 'FileDate',
                'formatter' => function($a3, $row ) {
                    
                    return '<a href="#">' . $a3 . '</a>';
                }
            ),

        array(
             'db'  => 'FileTime',
                'dt'  => 3,
                'field' => 'FileTime',
                'formatter' => function($a4, $row ) {
                    
                    return '<a href="../views/ViewBreed.php?FileID='. $row['FileID'] .'">' . $a4 . '</a>';
                }
            ),

        array(
             'db'  => 'Size',
                'dt'  => 4,
                'field' => 'Size',
                'formatter' => function($a5, $row ) {
                    
                    return '<a href="#">' . $a5 . '</a>';
                }
            ),


        array( 'db' => 'FileID', 'dt' => 5,'field' => 'FileID',
                    'formatter' => function( $d, $row ) {
                       return '<a href="#"><i class="fas fa-search" style="color:blue"></i></a>';
                }),
         array( 'db' => 'FileID', 'dt' => 6,'field' => 'FileID',
                    'formatter' => function( $d1, $row ) {
                       return '<a href="#"><i class="fas fa-download" style="color:green"></i></a>';
                })
          );

    $joinQuery = "FROM $table";

    require( '../dashboard/scripts/ssp.class.php' );

    // Output data as json format
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery)
    );


