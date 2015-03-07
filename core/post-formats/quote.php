<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<article class="article quote">

    <blockquote> <p> <?php echo wip_postmeta( 'wip_quote_text' ); ?> </p> </blockquote>

    <p><?php echo wip_postmeta( 'wip_quote_author' ); ?></p>

</article>
