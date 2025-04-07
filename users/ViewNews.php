<?php include ('include/header.php'); ?>

<style>
     .comment-container {
            width: 100%;
            margin: 0 auto;
        }
        
        .comment {
            background-color: white;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 12px;
        }
        
        .user-name {
            font-weight: bold;
            font-size: 18px;
        }
        
        
        .comment-body {
            padding-left: 52px; /* avatar width + margin */
            color: #000;
            line-height: 1.4;
        }
    </style>
<?php
                    $paramResult = checkId('id');
                    
                        $sql = "SELECT * 
                                FROM posts
                                WHERE id = $paramResult ";
                        $result = mysqli_query($conn, $sql);
                        $data = $result->fetch_assoc();
                       ?>
                       <div class="main-content">
            <div class="card" style="width: 90%; margin:2.5rem;">
            <div class="badge text-info text-wrap" style="width: 12rem;"><?= $data['time']; ?></div>
                <img src="Style/events/<?= $data['photos']; ?>" class="card-img-top">
                <div class="card-body">
                <h4 class="card-title"><?= $data['name']; ?></h4>
                <p class="card-text"><?= $data['description']; ?></p>
            <hr Style="margin: 1px auto; width: 97%;
                           border: 2.5px solid black;">
</div>
                           <br><br>
                           <div class="comment-container">

                    <?php
                        $comments = GetComment('comment',$paramResult);
                        if(mysqli_num_rows($comments) > 0 )
                    {
                        foreach($comments as $commentList)
                        {
                            ?>
        <div class="comment">
            <div class="comment-header">
                <div class="user-avatar"> <img style="height:60px; width: 60px; border-radius:50%;"<?php 
                        if ($commentList['photo'] != NULL) {
                              echo 'src="Style/profile/'.$commentList['photo'].'"';
                        } else {
                               echo 'src="Style/Photos/profile.jpg"';
                        }?> ></div>
                <span class="user-name"><?=  $commentList['name'];?></span>
            </div>
            <div class="comment-body">
            <?=  $commentList['comment'];?>          
          </div>
        </div>
        <?php
                        }
                    }
        ?>
        <!-- You can duplicate this block for more comments -->
    </div>


<br><br>
                           <form action="../admin/config/code.php" method="POST" enctype="multipart/form-data" class="d-flex">
                           <div class="input-group input-group-sm mb-3">
                <input class="form-control" type="hidden" name="level" value="<?= $row['level']; ?>">
                <input class="form-control" type="hidden" name="name" value="<?= $row['username']; ?>">
                <input class="form-control" type="hidden" name="photo" value="<?= $row['photos']; ?>">
                <input class="form-control" type="hidden" name="id" value="<?= $data['id'];?>">
                <input required class="form-control" type="text" name="comment_text" placeholder="Comment"style="padding: 1rem;">
            </div>
                 <button class="btn btn-info btn-lg" type="submit" name="comment">Send</button>
            </form>
</div>
<?php include('include/footer.php');?>