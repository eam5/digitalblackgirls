<?php echo head(array('bodyid'=>'home')); ?>

<div id="welcome-banner">
    <h1>Welcome to Digital Black Girls!</h1>
</div>

<div class="content-box">

    <a class="box module-background" href="<?php echo html_escape(url('about')); ?>">
    <div class="module">
        <h2><?php echo __('About the Project'); ?></h2>
        </div>
    </a>

    <a class="box photo-box box-photo-2" href="<?php echo html_escape(url('items?type=6')); ?>">
        <div class="box-text-rect">
        <h3 class="box-text"><?php echo __('Photos'); ?></h3>
        </div>
    </a>

    <a class="box photo-box box-video-1" href="<?php echo html_escape(url('items/browse?type=3')); ?>">       
        <div class="box-text-rect">
            <h3 class="box-text"><?php echo __('Videos'); ?></h3>
        </div>
    </a>

    <a class="box module-background module-background-hover" href="<?php echo html_escape(url('collections')); ?>">
        <div class="module">
        <h2><?php echo __('Collections'); ?></h2>
        </div>
    </a>

    <a class="box module-background" href="<?php echo html_escape(url('items')); ?>">
    <div class="module">
        <h2><?php echo __('Browse the Archive'); ?></h2>
        </div>
    </a>

    <a class="box photo-box box-video-4" href="<?php echo html_escape(url('items?type=1')); ?>">
        <div class="box-text-rect">
            <h3 class="box-text"><?php echo __('Stories'); ?></h3>
        </div>
    </a>

    <a class="box photo-box box-audio-1" href="<?php echo html_escape(url('items?type=5')); ?>">
        <div class="box-text-rect">
            <h3 class="box-text"><?php echo __('Audio'); ?></h3>
        </div>
    </a>

    <a class="box module-background module-background-hover" href="<?php echo html_escape(url('contribution')); ?>">
        <div class="module">
        <h2><?php echo __('Contribute Your'); ?><br /><?php echo __('Photos, Videos and More!'); ?></h2>
        </div>
    </a>

    <!-- <a class="box module-background" href="<?php echo html_escape(url('contact')); ?>">
    <div class="module">
        <h2><?php echo __('Contact Us'); ?></h2>
        </div>
    </a>


    <a class="box photo-box box-art-2" href="<?php echo html_escape(url('items?type=6')); ?>">
        <div class="box-text-rect">
            <h3 class="box-text"><?php echo __('Artwork'); ?></h3>
        </div>
    </a> -->


</div>
<div id="banner-footer"></div>
<div id="homepage-footer">
    <span style="padding-bottom:10px;"><?php echo __(link_to_home_page(option('site_title')).' is run by Dr. Aria S. Halliday & Dr. Ashleigh Greene Wade'); ?></span>
    <a href="<?php echo html_escape(url('photo-attributions')); ?>"><?php echo __('PHOTO ATTRIBUTIONS'); ?></a>
</div>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>