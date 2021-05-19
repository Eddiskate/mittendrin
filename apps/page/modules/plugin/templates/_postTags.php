<div class="container-post-tags hidden-xs">
    <?php foreach ($post_tagss as $lp => $post_tags): ?>
        <div class="el_list element_<?php echo $lp ?>"><a href="<?php echo url_for('@post_tags?name_url=' . $post_tags->getNameUrl()) ?>"><?php echo $post_tags->getName() ?></a></div>
    <?php endforeach; ?>
</div>
<style>
    .container-post-tags .el_list {
        display: inline-block;
        text-align: center;
        background-color: #ededed;
        color: #333;
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 13px;
        padding: 5px;
        border-bottom: 2px solid #d9d9d9;
    }
    .container-post-tags .el_list a {
        text-decoration: none;
        color: #333;
    }
    
    .container-post-tags .el_list a:hover {
        text-decoration: none;
        color: black;
    }
 </style>

