<?php 
include 'config.php';
 
 $output = '';  
 $sql = "SELECT * FROM product ORDER BY pid DESC";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="tbldata" class="table table-bordered">  
                <tr>  
                    <th>PRODUCT ID </th>
                    <th>NAME</th>
                   <TH>PRICE</TH>
                    <TH>QUANTITY</TH>
                    <TH>IMAGE</TH>
					<TH>TEAM ID</TH>
                     <TH></TH>
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                      <td>'.$row["pid"].'</td>
                     <td class="pname" data-id1="'.$row["pid"].'" contenteditable>'.$row["pname"].'</td>  
                     <td class="price" data-id2="'.$row["pid"].'" contenteditable>'.$row["price"].'</td>  
					 <td class="quality" data-id3="'.$row["pid"].'" contenteditable>'.$row["quantity"].'</td>  
					 <td class="image" data-id4="'.$row["pid"].'" contenteditable>'.$row["image"].'</td>  
					  <td class="team_id" data-id4="'.$row["pid"].'" contenteditable>'.$row["team_id"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["pid"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
        
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="7">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>