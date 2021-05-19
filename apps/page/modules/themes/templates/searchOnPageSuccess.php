<p>Pasujące wyniki w aktualnościach:</p>
<?php foreach ($posts as $post): ?>
    <div><a href="<?php echo url_for($post->getLinkPostShowUrl()) ?>"><?php echo $post['title'] ?></a></div>
<?php endforeach; ?>
<hr>
<p>Pasujące wyniki w treści stron:</p>
<?php foreach ($pages as $page): ?>
    <div><a href="<?php echo url_for('@cms_page_name_url?page_name_url=' . Configuration::getStringAndReplace($page['page_name'])) ?>"><?php echo $page['page_title'] ?></a></div>
<?php endforeach; ?>
