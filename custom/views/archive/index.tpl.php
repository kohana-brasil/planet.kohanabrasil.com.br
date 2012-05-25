<?php
$count = 0;
$today = Array();
$week = Array();
$month = Array();
$older = Array();
$now = time();
                    
foreach ($items as $item) {
    $age = ($now - $item->get_date('U')) / (60*60*24);
    if ($age < 1) {
        $today[] = $item;
    } elseif ($age < 7) {
        $week[] = $item;
    } elseif ($age < 30) {
        $month[] = $item;
    } else {
        $older[] = $item;
    }
}

header('Content-type: text/html; charset=UTF-8');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />

    <title><?php echo $PlanetConfig->getName(); ?></title>
    <?php include(dirname(__FILE__).'/head.tpl.php'); ?>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-32144124-1']);
      _gaq.push(['_setDomainName', 'kohanabrasil.com.br']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</head>

<body>
    <div id="page">
        <?php include(dirname(__FILE__).'/top.tpl.php'); ?>
        
        <div id="content">
            <?php if (0 == count($items)) :?>
            <div class="article">
                <h2 class="article-title">
                    No article
                </h2>
                <p class="article-content">No news, good news.</p>
            </div>
            <?php endif; ?>
            <?php if (count($today)): ?>
            <div class="article">
                <h2>Hoje</h2>
                <ul>
                <?php foreach ($today as $item): ?>
                    <?php $feed = $item->get_feed(); ?>
                    <li>
                    <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> : 
                    <a href="<?php echo $item->get_permalink(); ?>" title="Go to original place"><?php echo $item->get_title(); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <?php if (count($week)): ?>
            <div class="article">
                <h2>Esta Semana</h2>
                <ul>
                <?php foreach ($week as $item): ?>
                    <?php $feed = $item->get_feed(); ?>
                    <li>
                    <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> : 
                    <a href="<?php echo $item->get_permalink(); ?>" title="Go to original place"><?php echo $item->get_title(); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <?php if (count($month)): ?>
            <div class="article">
                <h2>Este Mês</h2>
                <ul>
                <?php foreach ($month as $item): ?>
                    <?php $feed = $item->get_feed(); ?>
                    <li>
                    <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> : 
                    <a href="<?php echo $item->get_permalink(); ?>" title="Go to original place"><?php echo $item->get_title(); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <?php if (count($older)): ?>
            <div class="article">
                <h2>Mais antigos</h2>
                <ul>
                <?php foreach ($older as $item): ?>
                    <?php $feed = $item->get_feed(); ?>
                    <li>
                    <a href="<?php echo $feed->getWebsite() ?>" class="source"><?php echo $feed->getName() ?></a> : 
                    <a href="<?php echo $item->get_permalink(); ?>" title="Go to original place"><?php echo $item->get_title(); ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
        
        <?php include_once(dirname(__FILE__).'/sidebar.tpl.php'); ?>
        
        <?php include(dirname(__FILE__).'/footer.tpl.php'); ?>
    </div>
    
    <script src="app/js/mm.js" type="text/javascript"></script>
</body>
</html>
