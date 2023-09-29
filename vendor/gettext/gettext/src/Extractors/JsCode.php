<?php

namespace Gettext\Extractors;

use Exception;
use Gettext\Translations;
use Gettext\Utils\FunctionsScanner;

/**
 * Class to get gettext strings from javascript files.
 */
class JsCode extends Extractor implements ExtractorInterface, ExtractorMultiInterface {

	public static $options = array(
		'constants' => array(),

		'functions' => array(
			'gettext'    => 'gettext',
			'__'         => 'gettext',
			'ngettext'   => 'ngettext',
			'n__'        => 'ngettext',
			'pgettext'   => 'pgettext',
			'p__'        => 'pgettext',
			'dgettext'   => 'dgettext',
			'd__'        => 'dgettext',
			'dngettext'  => 'dngettext',
			'dn__'       => 'dngettext',
			'dpgettext'  => 'dpgettext',
			'dp__'       => 'dpgettext',
			'npgettext'  => 'npgettext',
			'np__'       => 'npgettext',
			'dnpgettext' => 'dnpgettext',
			'dnp__'      => 'dnpgettext',
			'noop'       => 'noop',
			'noop__'     => 'noop',
		),
	);

	protected static $functionsScannerClass = 'Gettext\Utils\JsFunctionsScanner';

	/**
	 * @inheritdoc
	 * @throws Exception
	 */
	public static function fromString( $string, Translations $translations, array $options = array() ) {
		static::fromStringMultiple( $string, array( $translations ), $options );
	}

	/**
	 * @inheritDoc
	 * @throws Exception
	 */
	public static function fromStringMultiple( $string, array $translations, array $options = array() ) {
		$options += static::$options;

		/** @var FunctionsScanner $functions */
		$functions = new static::$functionsScannerClass( $string );
		$functions->saveGettextFunctions( $translations, $options );
	}

	/**
	 * @inheritDoc
	 * @throws Exception
	 */
	public static function fromFileMultiple( $file, array $translations, array $options = array() ) {
		foreach ( static::getFiles( $file ) as $file ) {
			$options['file'] = $file;
			static::fromStringMultiple( static::readFile( $file ), $translations, $options );
		}
	}
}
