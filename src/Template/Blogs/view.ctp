<h1><? print_r($blog[0]['name']); ?></h1>
<span class="heading_bdr"></span>
<div class="author_date">By Admin | <? print_r(date('M',strtotime($blog[0]['created']))); ?> <? print_r(date('d',strtotime($blog[0]['created']))); ?> , <? print_r(date('Y',strtotime($blog[0]['created']))); ?></div>
<div class="blog_body">
<?php echo $blog[0]['post']; ?>

</div>