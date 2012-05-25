<?php
$limit = $PlanetConfig->getMaxDisplay();
$count = 0;

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
    <script type="text/javascript">
    document.body.className += 'js';
    </script>
    <div id="page">
        <?php include(dirname(__FILE__).'/top.tpl.php'); ?>
        
        <div id="content">
            <?php if (0 == count($items)) : ?>
                <div class="article">
                    <h2 class="article-title">
                        No article
                    </h2>
                    <p class="article-content">No news, good news.</p>
                </div>
            <?php else : ?>
                <?php foreach ($items as $item): ?>
                    <?php 
                    $arParsedUrl = parse_url($item->get_feed()->get_link());
                    $host = preg_replace('/[^a-zA-Z]/i', '-', $arParsedUrl['host']);
                    ?>
                    <div class="article <?php echo $host; ?>">
                        <h2 class="article-title">
                            <a href="<?php echo $item->get_permalink(); ?>" title="Go to original place"><?php echo $item->get_title(); ?></a>
                        </h2>
                        <p class="article-info">
                            
                            <?php echo ($item->get_author()? $item->get_author()->get_name() : 'Anonymous'); ?>,
                            <?php 
                            $ago = time() - $item->get_date('U');
                            //echo '<span title="'.Duration::toString($ago).' ago" class="date">'.date('d/m/Y', $item->get_date('U')).'</span>';
                            echo '<span id="post'.$item->get_date('U').'" class="date">'.$item->get_date('d/m/Y').'</span>';
                            ?>
                            
                            |
                            
                            Source: <?php
                            $feed = $item->get_feed();
                            echo '<a href="'.$feed->getWebsite().'" class="source">'.$feed->getName().'</a>';
                            ?>
                        </p>
                        <div class="article-content">
                            <?php echo $item->get_content(); ?>
                        </div> 
                        
                        <?php if($count < 2){ ?>
                        <div class="article_ad_sense">
                           
                            <script type="text/javascript"><!--
                            google_ad_client = "ca-pub-5871309249860622";
                            /* Kohana - Brasil - 520 */
                            google_ad_slot = "7188478480";
                            google_ad_width = 468;
                            google_ad_height = 60;
                            //-->
                            </script>
                            <script type="text/javascript"
                            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                            </script>
                        </div>
                        <?php } ?>  
                        
                    </div>
                    <?php if (++$count == $limit) { break; } ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <?php include_once(dirname(__FILE__).'/sidebar.tpl.php'); ?>
        
        <?php include(dirname(__FILE__).'/footer.tpl.php'); ?>
    </div>
    
    <script src="app/js/mm.js" type="text/javascript"></script>
</body>
</html>
