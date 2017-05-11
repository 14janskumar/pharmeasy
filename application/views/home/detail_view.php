<div class="blog">
    <div id="blog_text">
        <h3>Prescription Details: <?php  echo $result['title'] ?></h3><br />
        <form name="frmSites">
            <table class="form" cellspacing="0" cellpadding="0" width="100%" style="margin-left:20px;">
                <tr>
                    <td>Prescription ID:</td>
                    <td><?php echo $result['id']; ?></td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><?php echo $result['title']; ?></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><?php echo $result['description']; ?></td>
                </tr>
            </table>
        </form>

    </div>
</div>