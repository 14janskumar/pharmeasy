<div class="blog">
<div id="blog_text">
    <section>List View: Home</section>
    <table id="table" cellspacing="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Prescription Title</th>
                    <th>Medical Record id</th>
                    <th>Medical Title</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach($result as $key=>$value){  ?>
                <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['medical_record_id']; ?></td>
                <td><?php echo $value['medical_titile']; ?></td>
                <?php if(!empty($value['status'])  && $value['status']=='A'){
                    $action = 'View'; ?>
               <td><a href="<?php echo site_url().'home/prescription_detail?pid='.$value['id']?>"><?php echo $action; ?></a></td>

               <?php }else if($value['status']=='P'){ ?>
                    
                <td><?php echo "Request Pending"; ?></td>

               <?php }  else {
                   $action = 'Request Access';
                   ?>
                
                 <td><a href="<?php echo site_url().'home/request_access?pid='.$value['id']?>"><?php echo $action; ?></a></td>

                <?php }  ?>
                </tr>
                <?php } ?>
            </tbody>
  </table>
</div>
</div>