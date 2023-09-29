<?php

namespace Gettext\Extractors;

use Gettext\Translations;
use Gettext\Utils\HeadersExtractorTrait;
use Gettext\Utils\CsvTrait;

/**
 * Class to get gettext strings from csv.
 */
class CsvDictionary extends Extractor implements ExtractorInterface {

	use HeadersExtractorTrait;
	use CsvTrait;

	public static $options = array(
		'delimiter'   => ',',
		'enclosure'   => '"',
		'escape_char' => '\\',
	);

	/**
	 * {@inheritdoc}
	 */
	public static function fromString( $string, Translations $translations, array $options = array() ) {
		$options += static::$options;
		$handle   = fopen( 'php://memory', 'w' );

		fputs( $handle, $string );
		rewind( $handle );

		while ( $row = static::fgetcsv( $handle, $options ) ) {
			list($original, $translation) = $row + array( '', '' );

			if ( $original === '' ) {
				static::extractHeaders( $translation, $translations );
				continue;
			}

			$translations->insert( null, $original )->setTranslation( $translation );
		}

		fclose( $handle );
	}
}
