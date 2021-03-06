<?php
return array(
    'extends' => 'bootstrap3',
    'css' => array(
        'compiled.css',
    	'aksearch.css',
        'vendor/font-awesome.min.css',
        'vendor/bootstrap-slider.css',
    	'vendor/bootstrap-datepicker/bootstrap-datepicker3.min.css',
    	'//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css',
        'print.css:print',
    ),
    'js' => array(
        'vendor/jquery.min.js',
        'vendor/bootstrap.min.js',
        'vendor/bootstrap-accessibility.min.js',
    	'vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    	'vendor/bootstrap-datepicker/locales/bootstrap-datepicker.de.min.js',
        //'vendor/typeahead.js',
        'autocomplete.js',
        'vendor/rc4.js',
        'common.js',
    	'aksearch.js',
        'lightbox.js',
    	'//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js',
    	'cookieconsent.js'
    ),
    'less' => array(
        'active' => false,
        'compiled.less'
    ),
    'favicon' => 'vufind-favicon.ico',
    'helpers' => array(
        'factories' => array(
        	'auth' => 'AkSearch\View\Helper\Root\Factory::getAuth',
        	'citation' => 'AkSearch\View\Helper\Root\Factory::getCitation',
            'flashmessages' => 'VuFind\View\Helper\Bootstrap3\Factory::getFlashmessages',
            'layoutclass' => 'VuFind\View\Helper\Bootstrap3\Factory::getLayoutClass',
        	'piwikoptout' => 'AkSearch\View\Helper\Root\Factory::getPiwikOptOut',
        	'searchbox' => 'AkSearch\View\Helper\Root\Factory::getSearchBox',
        	'aksearch' => 'AkSearch\View\Helper\Root\Factory::getAkSearch',
        ),
        'invokables' => array(
            'highlight' => 'VuFind\View\Helper\Bootstrap3\Highlight',
            'search' => 'VuFind\View\Helper\Bootstrap3\Search',
            'vudl' => 'VuDL\View\Helper\Bootstrap3\VuDL',
        )
    )
);
