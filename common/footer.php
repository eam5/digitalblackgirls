        </article>

    <footer role="contentinfo">
        <!-- <div id="footer-text"> -->
            <?php echo get_theme_option('Footer Text'); ?>
            <!-- <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?> -->
        <!-- </div> -->

        <div class="footer-content">
            <nav>
                <?php echo public_nav_main()->setMaxDepth(0);?>        
            </nav>
            <div class="to-top">
                <a href="#explore" aria-label="Back to top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>up-arrow-cirle</title><path d="M12,24C5.4,24,0,18.6,0,12S5.4,0,12,0s12,5.4,12,12S18.6,24,12,24z M12,1.5C6.2,1.5,1.5,6.2,1.5,12S6.2,22.5,12,22.5 S22.5,17.8,22.5,12C22.5,6.2,17.8,1.5,12,1.5z"/><path d="M12,19c-0.4,0-0.8-0.3-0.8-0.8V5.8C11.2,5.3,11.6,5,12,5s0.8,0.3,0.8,0.8v12.5C12.8,18.7,12.4,19,12,19z"/><path d="M16,10.5c-0.2,0-0.4-0.1-0.5-0.2L12,6.8l-3.5,3.5c-0.3,0.3-0.8,0.3-1.1,0c-0.3-0.3-0.3-0.7,0-1l4-4c0.3-0.3,0.8-0.3,1.1,0 l4,4c0.3,0.3,0.3,0.8,0,1.1C16.4,10.4,16.2,10.5,16,10.5z"/></svg>
                </a>
            </div>
        </div>

        <div id="footer-text">
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
            <div id="copyright-text"><span ><?php echo $copyright; ?></span></div>
            <?php endif; ?>
        <span><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></span>
        </div>

        <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
    </footer>

    </div><!-- end wrap -->
<script>
    var menu = new MmenuLight(
        document.querySelector( '#top-nav' ),
        'all'
    );

    var navigator = menu.navigation({
        selectedClass: 'mm-selected',
        // slidingSubmenus: true,
        theme: 'light'
        // title: 'Menu'
    });

    var drawer = menu.offcanvas({
        position: 'right'
    });

    //	Open the menu.
    document.querySelector( 'a[href="#top-nav"]' )
        .addEventListener( 'click', evnt => {
            evnt.preventDefault();
            drawer.open();
        });
</script>
</body>
</html>
