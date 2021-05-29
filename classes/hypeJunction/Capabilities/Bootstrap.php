<?php

namespace hypeJunction\Capabilities;

use Elgg\Includer;
use Elgg\PluginBootstrap;
use hypeJunction\Capabilities\PrepareMenus;
use hypeJunction\Capabilities\SetAdministerPermissions;
use hypeJunction\Capabilities\SetCreatePermissions;
use hypeJunction\Capabilities\SetDeletePermissions;
use hypeJunction\Capabilities\SetEditPermissions;
use hypeJunction\Capabilities\SetReadPermissions;

class Bootstrap extends PluginBootstrap {

	/**
	 * Get plugin root
	 * @return string
	 */
	protected function getRoot() {
		return $this->plugin->getPath();
	}

	/**
	 * {@inheritdoc}
	 */
	public function load() {
		Includer::requireFileOnce($this->getRoot() . '/autoloader.php');
	}

	/**
	 * {@inheritdoc}
	 */
	public function boot() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function init() {

		$hooks = $this->elgg()->hooks;

		$hooks->registerHandler('gatekeeper', 'all', \hypeJunction\Capabilities\SetReadPermissions::class);
		$hooks->registerHandler('permissions_check', 'all', \hypeJunction\Capabilities\SetEditPermissions::class);
		$hooks->registerHandler('permissions_check:delete', 'all', \hypeJunction\Capabilities\SetDeletePermissions::class);
		$hooks->registerHandler('permissions_check:administer', 'all', \hypeJunction\Capabilities\SetAdministerPermissions::class);
		$hooks->registerHandler('container_permissions_check', 'all', \hypeJunction\Capabilities\SetCreatePermissions::class);
		$hooks->registerHandler('capability', 'all', \hypeJunction\Capabilities\SetCustomPermissions::class);
		$hooks->registerHandler('prepare', 'all', \hypeJunction\Capabilities\PrepareMenus::class);
	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function activate() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function deactivate() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {

	}

}
