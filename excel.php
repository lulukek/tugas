<table border="1" width="100%" class="demo-table">
        <tr>
          <th width="1%">No</th>
          <th width="6%">ID Tape</th>
          <th width="1%">TLD</th>
          <th width="15%">Data Expiration</th>
          <th width="16%">Volume Pool</th>
          <th width="9%">Location</th>
          <th width="10%">Remarks</th>
          <th width="15%">Media Status</th>
          <th width="15%">Date Of Change</th>
        </tr>
        

        <?php

          $koneksi = mysqli_connect("localhost", "root", "", "pkl");

          $sql = mysqli_query($koneksi,"SELECT * FROM tape_list ORDER BY id_tape ASC");
          $no = 1;
          while($row = mysqli_fetch_assoc($sql))
          {
            echo "<tr>
            <td>$no</td>
            <td>".$row['id_tape']."</td>
            <td>".$row['tld']."</td>
            <td>".$row['data_expiration']."</td>
            <td>".$row['volume_pool']."</td>
            <td>".$row['location']."</td>
            <td>".$row['remarks']."</td>
            <td>".$row['media_status']."</td>
            <td>".$row['date_of_change']."</td>
            </tr>";
            $no++;
          }
        ?>
      </table>