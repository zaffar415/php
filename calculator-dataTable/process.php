<?php 
abstract class dbconnect {
    public $con;
    public function __construct() {
        $this->con=mysqli_connect("localhost","root","","hrm");
    }
}

class calculator extends dbconnect {
    public function index() 
    {
        //$result=mysqli_query($this->con,"select * from calc order by id desc");

        $params = $columns = $totalRecords = $data = array();
    
        $params = $_REQUEST;
        /* columns for search */   
        $columns = array(
            0 => 'value1',
            1 => 'value2', 
            2 => 'result'
        );
    
        $where_condition = $sqlTot = $sqlRec = "";
    
        if( !empty($params['search']['value']) ) {
            $where_condition .=	" WHERE ";
            /* Replace with column Array */
            $where_condition .= " ( value1 LIKE '%".$params['search']['value']."%' ";    
            /* Replace with column Array */
            $where_condition .= " OR value2 LIKE '%".$params['search']['value']."%' )";
        }
        /* select according to view */
        $sql_query = " SELECT value1,value2,operator,result FROM calc ";
        $sqlTot .= $sql_query;
        $sqlRec .= $sql_query;
        
        if(isset($where_condition) && $where_condition != '') {
            
            $sqlTot .= $where_condition;
            $sqlRec .= $where_condition;
        }
    
        $sqlRec .=  " ORDER BY id desc LIMIT ".$params['start']." ,".$params['length']." ";
    
        $queryTot = mysqli_query($this->con, $sqlTot) or die("Database Error:". mysqli_error($con));
    
        $totalRecords = mysqli_num_rows($queryTot);
    
        $queryRecords = mysqli_query($this->con, $sqlRec) or die("Error to Get the Post details.");
        
        $i=0;
        $r=0;
        // while( $row = mysqli_fetch_row($queryRecords) ) { 
        //     $data[] = $row;
        //     /* Change Value of 2nd index */
        //     $data[$i][5]="<a href=index.php?edit=$row[0]><i class='fa fa-edit text-primary' style='font-size:20px'> Edit</i></a>";   
        //     /* Change Value of 2nd index */
        //     $data[$i][6]="<a href=process.php?delete=$row[5]><i class='fa fa-trash text-danger' style='font-size:20px'> Delete</i></a>";   
        //     $i++;
        // }

        while( $row = mysqli_fetch_row($queryRecords) ) { 
            $data[]=$row;
        }
        
        $json_data = array(
            "draw"            => intval( $params['draw'] ),   
            "recordsTotal"    => intval( $totalRecords ),  
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data
        );
    
        echo json_encode($json_data);
    


    }

    public function insert()
    {
        $value1=$_REQUEST['val1'];
        $value2=$_REQUEST['val2'];
        $operator=$_REQUEST['operator'];
        $result=$_REQUEST['result'];
        mysqli_query($this->con,"insert into calc(value1,value2,operator,result) values($value1,$value2,'$operator',$result)");
    }
}






$calc=new calculator();
if(isset($_REQUEST['result']))
{
    $calc->insert();
}
if(@($_GET['index']))
{
    $calc->index();
}
?>