<h1>
    Bookmarks tagged with
    <?= $this->Text->toList($tags)?>
</h1>

<section>
<?php foreach ($bookmarks as $bookmark): ?>
    <article>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
        <small><?= h($bookmark->url) ?></small> 

        <!-- h() outputting user data prevent HTML injection issues -->
        
        <!-- Use the TextHelper to format text -->
        <?= $this->Text->autoParagraph($bookmark->description) ?>
    </article>
<?php endforeach; ?>
</section>