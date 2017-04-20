
<?php 
  $connection = mysql_connect("localhost", "root", ""); 
  $db = mysql_select_db("TravelAgency", $connection);
 // echo "<h1> Mohtih </h1>";
  $source = $_POST['source'];
  $dest = $_POST['dest'];
  if($source!='' ||$dest!='' )
  {
    $result = mysql_query("SELECT * FROM bus");
    $emparray = array();
    while ($row = mysql_fetch_assoc($result)) 
    {
        $flag=0;
        for($i=0;$i<strlen($row["BusRoute"]);$i++)
        {
          if($row["BusRoute"][$i] == $source[0])
          {
            $flag=1;
          }

          if($flag==1)
          {
            if($row["BusRoute"][$i] == $dest[0])
            {
              /* This Bus name need to be displayed with a button view which on pressing 
              gives details of bus - name , price and stops middle of it  */
              $emparray[] = $row;
              break;
            }
          }
        }
    }
    echo json_encode($emparray);
  }
  else
  {
    echo "Enter All The Details";
  }

?>