      <div class="row">
         <div class="large-12 columns">
            <img src="img/logo.png"><br><br>
            Instagram like Photo Gallery Grid
            
            <ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-clearing>
               <?php
               $query="SELECT * FROM tbl_photos ORDER by img_id ASC";
               $display_query=mysqli_query($connection,$query);
               while($row=mysqli_fetch_assoc($display_query))
               {
                $fileimage= $row["img_name"];
                $img_path= "img/$fileimage";
                $img_caption= $row["img_title"];
               ?>
               <li>
                <a href="<?php echo $img_path; ?>">
                  <img data-caption="<?php echo $img_caption; ?>" src="<?php echo $img_path; ?>">
               </a>
               </li>
               <?php } ?>

            </ul>
         </div>
      </div>