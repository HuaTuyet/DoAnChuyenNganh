<?php $list = getAllBrand($obj);
  foreach($list as $item){ ?>
<a class="link-brand" href="index.php?m=products&brand=<?php echo $item['brandId']?>">
  <?php echo $item['brandName'] ?>
</a>
<?php } ?>