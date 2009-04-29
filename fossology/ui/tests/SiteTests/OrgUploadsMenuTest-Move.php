<?php
/***********************************************************
 Copyright (C) 2008 Hewlett-Packard Development Company, L.P.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 version 2 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 ***********************************************************/

/**
 * Is the folder edit properties menu available?
 *
 * @version "$Id$"
 *
 * Created on Jul 31, 2008
 */
require_once ('../../../tests/fossologyTestCase.php');
require_once ('../../../tests/TestEnvironment.php');

global $URL;

class UploadsMoveMenuTest extends fossologyTestCase
{

  function testUploadsMoveMenu()
  {
    global $URL;
    print "starting UploadsMoveMenuTest\n";
    $this->Login();
    /* we get the home page to get rid of the user logged in page */
    $loggedIn = $this->mybrowser->get($URL);
    $this->assertTrue($this->myassertText($loggedIn, '/Organize/'));
    $this->assertTrue($this->myassertText($loggedIn, '/Uploads/'));
    $this->assertTrue($this->myassertText($loggedIn, '/Delete Uploaded File/'));
    $this->assertTrue($this->myassertText($loggedIn, '/Edit Properties/'));
    $this->assertTrue($this->myassertText($loggedIn, '/Move/'));
    $this->assertTrue($this->myassertText($loggedIn, '/Remove License Analysis/'));
    /* ok, this proves the text is on the page, let's see if we can
     * get to the delete page.
     */
    $page = $this->mybrowser->get("$URL?mod=upload_move");
    $this->assertTrue($this->myassertText($page, '/Move upload to different folder/'));
    $this->assertTrue($this->myassertText($page, '/Select the destination folder/'));
  }
}
?>
