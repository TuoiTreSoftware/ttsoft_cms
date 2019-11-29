<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Plugin {

    private $_plugins = null;
    private $_activePlugins = null;

    public function __construct() {
        $plugins = $this->getPlugins();
        foreach ($plugins as $key => $plugin) {
            list($path) = explode('/', $key);
            $path .= '/plugins_included_before.php';
            if (file_exists(FCPATH . WP_PLUGIN_DIR . $path)) {
                include FCPATH . WP_PLUGIN_DIR . $path;
            }
        }
    }

    /**
     *  Get plugin url
     *
     * @param string $plugin
     * @return string
     */
    public function pluginUrl($plugin) {
        $path = str_replace(FCPATH, '', $plugin);
        $pathInfo = pathinfo($path);
        $dirParts = explode(DIRECTORY_SEPARATOR, $pathInfo['dirname']);
        $pluginUrl = base_url() . implode('/', array_splice($dirParts, 0, 3));
        return $pluginUrl;
    }

    /**
     *  Get plugin dir
     *
     * @param string $plugin
     * @return string
     */
    public function pluginDir($plugin) {
        $pathInfo = pathinfo(str_replace(FCPATH, '', $plugin));
        $dirParts = explode(DIRECTORY_SEPARATOR, $pathInfo['dirname']);
        $pluginDir = FCPATH . implode(DIRECTORY_SEPARATOR, array_splice($dirParts, 0, 2)) . DIRECTORY_SEPARATOR;
        return $pluginDir;
    }

    /**
     *  Get plugin name
     *
     * @param string $plugin
     * @return string
     */
    public function pluginName($plugin) {
        $pathInfo = pathinfo(ltrim($plugin, FCPATH));
        $dirParts = explode(DIRECTORY_SEPARATOR, $pathInfo['dirname']);
        $pluginName = isset($dirParts[1]) ? $dirParts[1] : '';
        return $pluginName;
    }

    /**
     *  Get installed plugins list
     *
     *  @return array
     */

    public function getPlugins() {
        if (is_null($this->_plugins)) {
            $this->_plugins = $this->_scanPlugins();
        }
        return $this->_plugins;
    }

    /**
     *  Check if plugin is active
     *
     *  @param  string  $plugin
     *  @return boolean
     */
    public function isPluginActive($plugin) {
        return in_array($plugin, $this->getActivePlugins());
    }

    /**
     *  Get list of active plugins
     *
     *  @return array
     */
    public function getActivePlugins() {
        if (is_null($this->_activePlugins)) {
            $activePlugins = get_option('active_plugins');
            $this->_activePlugins = $activePlugins ? $activePlugins : array();
        }
        return $this->_activePlugins;
    }

    /**
     *  Activate plugin
     *
     *  @param  string  $plugin
     *  @return boolean
     */
    public function activatePlugin($plugin) {
        $activePlugins = $this->getActivePlugins();
        if ( ! in_array($plugin, $activePlugins)) {
            $activePlugins[] = $plugin;
            $this->_updateActivePlugins($activePlugins);
        }
        return true;
    }

    /**
     *  Deactivate plugin
     *
     *  @param  string  $plugin
     *  @return boolean
     */
    public function deactivatePlugin($plugin) {
        $activePlugins = $this->getActivePlugins();
        foreach ($activePlugins as $key => $_plugin) {
            if ($plugin == $_plugin) {
                unset($activePlugins[$key]);
            }
        }
        $this->_updateActivePlugins($activePlugins);
        return true;
    }

    /**
     *  Find installed plugins
     *
     *  @return array
     */
    private function _scanPlugins() {
        $path = FCPATH . WP_PLUGIN_DIR;
        $plugins = array();
        $pluginDirs = glob($path . '*' , GLOB_ONLYDIR);
        if ($pluginDirs)
        foreach ($pluginDirs as $dir) {
            $dirName = basename($dir);
            $fileName = $dirName . '.php';
            $filePath = $dir . '/' . $fileName;
            if (file_exists($filePath)) {
                $plugin = array();
                $fileContent = file_get_contents($filePath);
                $fileContent = strstr($fileContent, '*/', true);
                foreach (explode("\n", $fileContent) as $line) {
                    $parts = explode(': ', $line);
                    if (count($parts) == 2) {
                        switch (trim(strtolower(str_replace('*', '', $parts[0])))) {
                            case 'plugin name' : $key = 'Name'; break;
                            case 'plugin uri' : $key = 'PluginURI'; break;
                            case 'description' : $key = 'Description'; break;
                            case 'author' : $key = 'Author'; break;
                            case 'version' : $key = 'Version'; break;
                            case 'author uri' : $key = 'AuthorURI'; break;
                            default: $key = str_replace(' ', '', trim($parts[0])); break;
                        }
                        $plugin[$key] = trim($parts[1]);
                    }
                }
                if (isset($plugin['Name']) && isset($plugin['Version'])) {
                    $plugin['Network'] = false;
                    $plugin['Title'] = $plugin['Name'];
                    $plugin['AuthorName'] = $plugin['Author'];
                    $plugins[$dirName . '/' . $fileName] = $plugin;
                }
            }
        }
		return $plugins;
    }

    /**
     *  Update active plugins
     *
     *  @param  array   $plugins
     */
    private function _updateActivePlugins($plugins) {
        $this->_activePlugins = $plugins;
        update_option('active_plugins', $plugins);
    }

    /**
     * Get list of slider plugin statuses
     *
     * @param RevSliderSlider $slider
     * @return array
     */

    public function getSliderPlugins($slider) {
        $plugins = array(
            'beforeafter'       => $slider->getParam('beforeafter_enabled', false) == 'true',
            'bubblemorph'       => $slider->getParam('bubblemorph_enabled', false) == 'true',
            'duotonefilters'    => $slider->getParam('duotonefilters_enabled', false) == 'true',
            'filmstrip'         => $slider->getParam('filmstrip_enabled', false) == 'true',
            'liquideffect'      => $slider->getParam('liquideffect_enabled', false) == 'true',
            'panorama'          => $slider->getParam('panorama_enabled', false) == 'true',
            'particles'         => $slider->getParam('particles_enabled', false) == 'true',
            'polyfold'          => $slider->getParam('polyfold_top_enabled', false) == 'true' ||
                                   $slider->getParam('polyfold_bottom_enabled', false) == 'true',
            'revealer'          => $slider->getParam('revealer_enabled', false) == 'true',
            'slicey'            => $slider->getParam('slicey_enabled', false) == 'true',
            'snow'              => $slider->getParam('snow_enabled', false) == 'true',
            'typewriter'        => $slider->getParam('typewriter_defaults_enabled', false) == 'true',
            'weather'           => $slider->getParam('revslider-weather-enabled', false) == 'true',
            'whiteboard'        => $slider->getParam('wb_enable', false) == 'on'
        );
        return $plugins;
    }

}