<?php

namespace Gettext\Extractors;

use Gettext\Translations;
use Twig_Loader_Array;
use Twig_Environment;
use Twig_Source;
use Twig_Extensions_Extension_I18n;

/**
 * Class to get gettext strings from twig files returning arrays.
 */
class Twig extends Extractor implements ExtractorInterface {

	public static $options = array(
		'extractComments' => 'notes:',
		'twig'            => null,
	);

	/**
	 * {@inheritdoc}
	 */
	public static function fromString( $string, Translations $translations, array $options = array() ) {
		$options += static::$options;

		$twig = $options['twig'] ?: static::createTwig();

		PhpCode::fromString( $twig->compileSource( new Twig_Source( $string, '' ) ), $translations, $options );
	}

	/**
	 * Returns a Twig instance.
	 *
	 * @return Twig_Environment
	 */
	protected static function createTwig() {
		$twig = new Twig_Environment( new Twig_Loader_Array( array( '' => '' ) ) );
		$twig->addExtension( new Twig_Extensions_Extension_I18n() );

		return static::$options['twig'] = $twig;
	}
}
