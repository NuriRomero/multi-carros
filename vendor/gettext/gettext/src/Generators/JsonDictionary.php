<?php

namespace Gettext\Generators;

use Gettext\Translations;
use Gettext\Utils\DictionaryTrait;

class JsonDictionary extends Generator implements GeneratorInterface {

	use DictionaryTrait;

	public static $options = array(
		'json'           => 0,
		'includeHeaders' => false,
	);

	/**
	 * {@parentDoc}.
	 */
	public static function toString( Translations $translations, array $options = array() ) {
		$options += static::$options;

		return json_encode( static::toArray( $translations, $options['includeHeaders'] ), $options['json'] );
	}
}
