<?php declare(strict_types=1);

namespace Tribe\Storage\Identity;

/**
 * Identify the user running the PHP process.
 *
 * @package Tribe\Storage\Identity
 */
interface Identifier {

	/**
	 * The user id.
	 *
	 * @return int
	 */
	public function uid(): int;

	/**
	 * The group id.
	 *
	 * @return int
	 */
	public function gid(): int;

}
