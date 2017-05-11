<div class="blog">
<div id="blog_text">
    <section>List View: Home</section>
    <table id="table" cellspacing="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prescription Subject</th>
                    <th>Medical Record id</th>
                    <th>Medical Title</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $key=>$value){  ?>
                <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['medical_record_id']; ?></td>
                <td><?php echo $value['medical_titile']; ?></td>
                <td><a href="<?php echo site_url().'home/prescription_detail?pid='.$value['id']?>">View</a></td>
                </tr>
                <?php } ?>
            </tbody>
  </table>
</div>
</div>