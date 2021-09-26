<?php

function digitalblackgirls_output_text_track_file($textFile) {
    $kind = metadata($textFile, array('Dublin Core', 'Type'));
    $language = metadata($textFile, array('Dublin Core', 'Language'));
    $label = metadata($textFile, array('Dublin Core', 'Title'));

    if (!$kind) {
        $kind = 'subtitles';
    }

    if (!$language) {
        $language = get_html_lang();
    }

    $trackSrc = html_escape($textFile->getWebPath('original'));

    if ($label) {
        $labelPart = ' label="' . $label . '"';
    } else {
        $labelPart = '';
    }

    $track = '<track kind="' . $kind . '" src="' . $trackSrc . '" srclang="' . $language . '"' . $labelPart . '>';

    return $track;
}

function digitalblackgirls_check_for_tracks($files) {
    foreach ($files as $file) {
        if ($file->getExtension() == "vtt") {
            return true;
        }
    }
    return false;
}

function digitalblackgirls_get_square_thumbnail_url($file, $view) {
    if ($file->hasThumbnail()) {
        $squareThumbnail = file_display_url($file, 'square_thumbnail');
    } else {
        $mimeType = $file->mime_type;
        $fileType = (strpos($mimeType, 'image')) ? 'image' : 'file';
        // $squareThumbnail = $view->baseUrl() . '/themes/digitalblackgirls/img/fallback-' . $fileType . '.png';

        $squareThumbnail = $view->baseUrl() . '/application/views/scripts/images/fallback-' . $fileType . '.png';
    }
    return $squareThumbnail;
}


/**
 * Replicates Omeka's default item_citation output, but checks
 * if the item was submitted under the condition of anonymity.
 * If so, the creator name is replaced with 'Anonymous'. If not,
 * the DC:Creator name is used instead of the submitter's
 * username.
 */
function filter_item_citation($citation, $args) {
    $citation = '';
    $item = $args['item'];
    $contribItem = get_db()->getTable('ContributionContributedItem')->findByItem($item);
    if ($contribItem->anonymous) {
        $creator = 'Anonymous';
    } else {
        $creators = metadata($item, array('Dublin Core', 'Creator'), array('all' => true));
        // Strip formatting and remove empty creator elements.
        $creators = array_filter(array_map('strip_formatting', $creators));
        if ($creators) {
            switch (count($creators)) {
                case 1:
                    $creator = $creators[0];
                    break;
                case 2:
                    /// Chicago-style item citation: two authors
                    $creator = __('%1$s and %2$s', $creators[0], $creators[1]);
                    break;
                case 3:
                    /// Chicago-style item citation: three authors
                    $creator = __('%1$s, %2$s, and %3$s', $creators[0], $creators[1], $creators[2]);
                    break;
                default:
                    /// Chicago-style item citation: more than three authors
                    $creator = __('%s et al.', $creators[0]);
            }
        }
    }
    $citation .= "$creator, ";

    if ($title = metadata($item, 'display_title')) {
        $citation .= "&#8220;$title,&#8221; ";
    }
    if ($siteTitle = option('site_title')) {
        $citation .= "<em>$siteTitle</em>, ";
    }
    $accessed = format_date(time(), Zend_Date::DATE_LONG);
    $url = '<span class="citation-url">'.html_escape(record_url($item, null, true)).'</span>';
    /// Chicago-style item citation: access date and URL
    $citation .= __('accessed %1$s, %2$s.', $accessed, $url);

    return $citation;
}

?>