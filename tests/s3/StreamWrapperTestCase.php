<?php

namespace Tribe\Storage\Tests\s3;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Tribe\Storage\Cache\Lru;
use League\Flysystem\Filesystem;
use Tribe\Storage\Tests\TestCase;
use League\Flysystem\Plugin\ForcedRename;
use Tribe\Storage\StreamWrapper;
use Jhofm\FlysystemIterator\Plugin\IteratorPlugin;
use Tribe\Storage\Identity\Posix_Identifier;

class StreamWrapperTestCase extends TestCase {

	protected $filesystem;

	protected function setUp(): void {
		parent::setUp();

		$client = new S3Client( [
			'credentials'             => [
				'key'    => 'flysystem',
				'secret' => 'helloworld',
			],
			'region'                  => 'us-east-1',
			'version'                 => 'latest',
			'endpoint'                => 'http://tests3:9000',
			'use_path_style_endpoint' => true,
		] );

		$adapter    = new AwsS3Adapter( $client, 'test-bucket' );
		$identifier = new Posix_Identifier();
		$cache      = new Lru();
		$filesystem = new Filesystem( $adapter, [ 'visibility' => 'public' ] );
		$filesystem->addPlugin( new IteratorPlugin() );
		$filesystem->addPlugin( new ForcedRename() );

		$this->filesystem = $filesystem;
		StreamWrapper::register( $filesystem, $identifier, $cache );
	}

	protected function tearDown(): void {
		parent::tearDown();

		StreamWrapper::unregister();
	}

}
