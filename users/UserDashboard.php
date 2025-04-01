<?php include ('include/header.php'); ?>

<div class="main-content">
            <div class="content">
<?php
$colleges = $row['colleges']; 
                    $posts = GetData('posts', $colleges );
                    if(mysqli_num_rows($posts) > 0 )
                    {
                        foreach($posts as $postsList)
                        {
                            ?>
<div class="card" style="width: 100%; padding:5rem;">
  <img src="Style/events/<?= $postsList['photos']; ?>" class="card-img-top">
  <div class="card-body">
  <div class="badge text-info text-wrap" style="width: 12rem;"><?= $postsList['time']; ?></div>
    <h5 class="card-title"><?= $postsList['name']; ?></h5>
    <p class="card-text"><?= $postsList['description']; ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<br>
<?php 
        }
    }
    else
    {
        ?>
            <tr>
                <td colspan="4">
                    No Posts in <?php echo $colleges; ?>!
                </td>
            </tr>
        <?php
    }
  ?>
                
            </div>
        </div>
</div>

<?php include ('include/footer.php'); ?>