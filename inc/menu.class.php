<?php
/*
 * @version $Id: HEADER 15930 2011-10-30 15:47:55Z tsmr $
 -------------------------------------------------------------------------
 webapplications plugin for GLPI
 Copyright (C) 2009-2016 by the webapplications Development Team.

 https://github.com/InfotelGLPI/webapplications
 -------------------------------------------------------------------------

 LICENSE
      
 This file is part of webapplications.

 webapplications is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 webapplications is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with webapplications. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */
 
class PluginWebapplicationsMenu extends CommonGLPI {
   static $rightname = 'plugin_webapplications';

   static function getMenuName() {
      return _n('Web application', 'Web applications', 2, 'webapplications');
   }

   static function getMenuContent() {
      global $CFG_GLPI;

      $menu                                           = array();
      $menu['title']                                  = self::getMenuName();
      $menu['page']                                   = "/plugins/webapplications/front/webapplication.php";
      $menu['links']['search']                        = PluginWebapplicationsWebapplication::getSearchURL(false);
      if (PluginWebapplicationsWebapplication::canCreate()) {
         $menu['links']['add']                        = PluginWebapplicationsWebapplication::getFormURL(false);
      }

      return $menu;
   }

   static function removeRightsFromSession() {
      if (isset($_SESSION['glpimenu']['assets']['types']['PluginWebapplicationsMenu'])) {
         unset($_SESSION['glpimenu']['assets']['types']['PluginWebapplicationsMenu']); 
      }
      if (isset($_SESSION['glpimenu']['assets']['content']['pluginwebapplicationsmenu'])) {
         unset($_SESSION['glpimenu']['assets']['content']['pluginwebapplicationsmenu']); 
      }
   }
}