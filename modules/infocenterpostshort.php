<?php

/*
 * LMS iNET
 *
 *  (C) Copyright 2012 LMS iNET Developers
 *
 *  Please, see the doc/AUTHORS for more information about authors!
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License Version 2 as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 *  USA.
 *
 *  $Id: v 1.00 2012/12/22 01:53:35 Sylwester Kondracki Exp $
 */

$id = (int)$_GET['id'];
$SMARTY->assign('info', $DB->GetAll('SELECT i.cdate, i.mdate, i.post, 
	(SELECT login FROM users WHERE users.id = i.cuser) AS clogin ,
	(SELECT login FROM users WHERE users.id = i.muser) AS mlogin 
	FROM info_center_post i WHERE i.infoid = ? ORDER BY i.cdate DESC LIMIT 3;',array($id)));

$SMARTY->assign('topic',$DB->GetRow('SELECT t.*, (SELECT login FROM users WHERE users.id = t.closeduser) AS closedname FROM info_center t WHERE id = ?',array($id)));

$SMARTY->display('infocentrumpostshort.html');
?>
