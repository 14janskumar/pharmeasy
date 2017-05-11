<div class="blog">
<div id="blog_text">
    <section>List View: Notification</section>
    <table id="table" cellspacing="1" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prescription Subject</th>
                    <th>Accessor Name</th>
                    <th style="width:125px;" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $key=>$value){  ?>
                <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['accessor_name']; ?></td>
                <td><a href="<?php echo site_url().'notification/grant_access?pacl_id='.$value['pacl_id'].'&st=A'?>">Allow</a></td>
                <td><a href="<?php echo site_url().'notification/grant_access?pacl_id='.$value['pacl_id'].'&st=D'?>">Deny</a></td>
                </tr>
                <?php } ?>
            </tbody>
  </table>
</div>
</div>