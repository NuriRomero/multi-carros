<?php

namespace Gettext\Generators;

use Gettext\Translations;
use Gettext\Utils\MultidimensionalArrayTrait;

class Json extends Generator implements GeneratorInterface {

	use MultidimensionalArrayTrait;

	public static $options = array(
		'json'           => 0,
		'includeHeaders' => false,
	);

	/**
	 * {@inheritdoc}
	 */
	public static function toString( Translations $translations, array $options = array() ) {
		$options += static::$options;

		return json_encode( static::toArray( $translations, $options['includeHeaders'], true ), $options['json'] );
	}
}
