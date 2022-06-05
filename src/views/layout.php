<?php
use Oni\Web\Helper\HTML;

$postfix = time();
$name = $blog['config']['name'];
$lang = $blog['config']['lang'];
$slogan = $blog['config']['slogan'];
$footer = $blog['config']['footer'];

$domainName = $blog['config']['domainName'];
$baseUrl = $blog['config']['baseUrl'];

$googleAnalytics = $blog['config']['googleAnalytics'];
$disqusShortname = $blog['config']['disqusShortname'];

$title = isset($container['title'])
    ? "{$container['title']} | {$blog['config']['name']}"
    : $blog['config']['name'];
$description = (!isset($container['description']) || '' === $container['description'])
    ? $blog['config']['description']
    : $container['description'];
?>
<div id="main">
    <div id="border">
        <hgroup id="header">
            <h1><?=HTML::linkTo($baseUrl, $name)?></h1>
            <h2><?=$slogan?></h2>
        </hgroup>

        <nav id="nav">
            <form id="nav_search" action="http://www.google.com/search?q=as" target="_blank" method="get">
                <input type="hidden" name="q" value="site:<?=$domainName?>">
                <input type="text" name="q" placeholder="Search">
                <input type="submit">
            </form>
            <a href="<?=$baseUrl?>">Home</a>
            <a href="<?="{$baseUrl}about/"?>">About</a>
        </nav>

        <div id="container">
            <?=$this->loadContent()?>
        </div>

        <div id="side">
        <?php foreach ($theme['config']['views']['side'] as $name): ?>
        <?=$this->loadPartial("side/{$name}")?>
        <?php endforeach; ?>
        </div>

        <footer id="footer">
            <?=$footer?> - <a href="https://github.com/scarwu/Pointless" target="_blank">Powered by Pointless</a>
        </footer>
    </div>
</div>

<?php if(null !== $disqusShortname): ?>
<script>
    var disqusShortname = '<?=$disqusShortname?>';

    if (document.getElementsByTagName('disqus_comments')) {
        asyncLoad('//' + disqusShortname + '.disqus.com/count.js');
    }

    if (document.getElementById('disqus_thread')) {
        asyncLoad('//' + disqusShortname + '.disqus.com/embed.js');
    }
</script>
<?php endif; ?>