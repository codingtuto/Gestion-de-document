<?php
// Database connection info
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'filemanagementsystem_db'
);

// DB table to use
$table      = 'personal_file';
// Table's primary key
$primaryKey = 'PersonalFileID';

$columns = array(
    
    array(
        'db' => 'FileName',
        'dt' => 0,
        'field' => 'FileName',
        'formatter' => function($a1, $row)
        {
            
            return '<img src="../img/folder-128.png" width="25px" height="25px" > ' . $a1 . '';
        }
    ),
    
    array(
        'db' => 'FullName',
        'dt' => 1,
        'field' => 'FullName',
        'formatter' => function($a2, $row)
        {
            
            return '' . $a2 . '';
        }
    ),
    
    
    
    array(
        'db' => 'TimeUpload',
        'dt' => 2,
        'field' => 'TimeUpload',
        'formatter' => function($a3, $row)
        {
            
            return '' . $a3 . '';
        }
    ),
    
    array(
        'db' => 'Size',
        'dt' => 3,
        'field' => 'Size',
        'formatter' => function($a4, $row)
        {
            
            return '' . floor($a4 / 1000) . ' KB' . '';
        }
    ),
        array(
        'db' => 'Status',
        'dt' => 4,
        'field' => 'Status',
        'formatter' => function($a5, $row)
        {
            
             return '' . $a5 . '';
        }
    ),
    
    
    
    array(
        'db' => 'PersonalFileID',
        'dt' => 5,
        'field' => 'PersonalFileID',
        'formatter' => function($d, $row)
        {
            return '<img src="../img/Documents_folder_share_folder_shared-128.png" class="shared" width="30px" height="30px"  title="Shared File" id-data="' . $d . '">';
        }
    )
);

$joinQuery = "FROM $table WHERE status = 'Admin'";

// $where .= "ORDER BY FileName DESC";

require('../Administrator/scripts/ssp.class.php');

// Output data as json format
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery));
