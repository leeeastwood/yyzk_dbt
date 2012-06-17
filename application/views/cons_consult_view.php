
   <div class="midarea">
    <div>
        <?php 
            $op = $this->uri->segment(3);
            if ($op === false) {?>
        新建担保咨询单，请点击：
        <?php }?>
        <?php echo $output; ?>
    </div>
  </div>
