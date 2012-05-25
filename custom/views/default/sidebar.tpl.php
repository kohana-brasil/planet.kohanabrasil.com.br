<?php
$all_people = &$Planet->getPeople();
usort($all_people, array('PlanetPerson', 'compare'));
?>
<div id="sidebar" class="aside">
    <div id="sidebar-people" class="section">
        <h2>Blogs (<?php echo count($all_people); ?>)</h2>
        <ul>
            <?php foreach ($all_people as $person) : ?>
            <li>
                <a href="<?php echo htmlspecialchars($person->getFeed(), ENT_QUOTES, 'UTF-8'); ?>" title="Feed"><img src="postload.php?url=<?php echo urlencode(htmlspecialchars($person->getFeed(), ENT_QUOTES, 'UTF-8')); ?>" alt="" height="12" width="12" /></a>
                <a href="<?php echo $person->getWebsite(); ?>" title="Website"><?php echo htmlspecialchars($person->getName(), ENT_QUOTES, 'UTF-8'); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <p>
        <img src="custom/img/opml.png" alt="feed" height="12" width="12" /> <a href="custom/people.opml">Todos os feeds no formato OPML</a>
        </p>
    </div>
    
    <div class="section">
        <h2>Assine</h2>
        <ul>
            <li><img src="custom/img/feed.png" alt="feed" height="12" width="12" />&nbsp;<a href="?type=atom10">Feed (ATOM)</a></li>
        </ul>
    </div>

    <div class="section">
        <h2>Arquivo</h2>
        <ul>
            <li><a href="?type=archive">Ver todos os posts</a></li>
        </ul>
    </div>
    
    <div id="sidebar_adsense" class="section">
        
        <script type="text/javascript"><!--
        google_ad_client = "ca-pub-5871309249860622";
        /* Kohana Brasil - 160 */
        google_ad_slot = "1591035450";
        google_ad_width = 160;
        google_ad_height = 600;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
        
    </div>
    
</div>