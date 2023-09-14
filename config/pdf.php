<?php
return [
	'mode'                 => 'utf-8',
	'format'               => 'A4',
	'default_font_size'    => 12,
    //replace Khmer OS for unicode
	'default_font'         => 'sans-serif',
	'margin_left'          => 10,
	'margin_right'         => 10,
	'margin_top'           => 10,
	'margin_bottom'        => 10,
	'margin_header'        => 0,
	'margin_footer'        => 0,
	'orientation'          => 'P',
	'title'                => 'PDF',
	'author'               => 'UltimateKode',
	'watermark'            => '',
	'show_watermark'       => true,
	'watermark_font'       => 'sans-serif',
	'watermark_text_alpha' => 0.1,
	'custom_font_dir'      => '',
	'custom_font_data' 	   => [],
	'auto_language_detection'  => false,
    'tempDir' =>storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'temp'
];
