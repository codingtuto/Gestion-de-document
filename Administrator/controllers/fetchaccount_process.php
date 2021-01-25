<?php
// Database connection info
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'filemanagementsystem_db'
);

// DB table to use
$table      = 'account';
// Table's primary key
$primaryKey = 'AccountID';

$columns = array(
    
    array(
        'db' => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
        'dt' => 0,
        'field' => 'CONCAT(FirstName, " ", MiddleName, ". ",LastName)',
        'formatter' => function($a1, $row)
        {
            
            return '<a href="#">' . $a1 . '</a>';
        }
    ),
    
    array(
        'db' => 'Username',
        'dt' => 1,
        'field' => 'Username',
        'formatter' => function($a2, $row)
        {
            
            return '<a href="#">' . $a2 . '</a>';
        }
    ),
    
    array(
        'db' => 'Status',
        'dt' => 2,
        'field' => 'Status',
        'formatter' => function($dx, $row)
        {
            
                $status = '<div class="action-buttons">';
            
            if ($row['Status'] == '1') {
                $status.= "<button type='button' class='btn btn-success btn-sm' style = 'background-color: #52d14b;border:none'>Enable&nbsp;</button'>";
            } else {
                $status .= "<button type='button' class='btn btn-danger btn-sm' style = 'background-color: #d1954b;border:none'>Disable</button'>";
            }
            
                $status .= '</div></div>';
            return $status;
        }
    ),
    
    
    array(
        'db' => 'AccountType',
        'dt' => 3,
        'field' => 'AccountType',
        'formatter' => function($a6, $row)
        {
            
            return '<a href="#">' . $a6 . '</a>';
        }
    ),
    
    
    
    
    array(
        'db' => 'AccountID',
        'dt' => 4,
        'field' => 'AccountID',
        'formatter' => function($d, $row)
        {
            return '        
                   <button type="button" class="btn btn-success btn-sm edit" id-data="' . $d . '">Edit</button>                         
                   
                ';
                // <button type="button" class="btn btn-danger btn-sm"  alt="' . $d . '" class="">Delete</button> 
          }
      )
    
);

$joinQuery = "FROM $table a INNER JOIN staff b ON a.StaffID = b.StaffID";

require('../Administrator/scripts/ssp.class.php');

// Output data as json format
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery));
