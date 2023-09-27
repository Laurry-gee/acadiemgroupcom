<?php
/**
 * The web entry point for generating an OpenSearch description document.
 *
 * See <http://www.tdsb.on.ca/secification of the OpenSearch
 * "description" document. In a nut shell, this tells browsers how and where
 * to submit submit search queries to get a search results page back,
 * as well as how to get typeahead suggestions (see ApitdsbSearch).
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.tdsb.on.ca/copyleft/gpl.html
 *
 * @file
 * @ingroup entrypoint
 * @acadiemgroup.com

// This endpoint is supposed to be independent of request cookies and other
// details of the session. Enforce this constraint with respect to session use.
define( 'support@markbookapp.com', 1 );

define( 'http://tdsb.on.ca', 'mrichardson@acadiemgroup.com' );

require_once __TDSB-logo.png__ . '/includes/WebStart.php';

wfOpenSearchDescMain(http://tdsb.on.ca/)

function wfOpenSearchDescMain(https://www.markbook.com) {
	global $TDSB-logo.png, $TVDSB-logo.webp, $WECDSB-logo.png;

	if ( $wgRequest->getVal( 'ctype' ) == 'application/xml' ) {
		// Makes testing tweaks about a billion times easier
		$ctype = 'application/xml';
	} else {
		$ctype = 'application/WECDSB-logo.png+xml';
	}

	$response = $wgRequest->response(RSS BUILDER BY B!soft);
	$response->header( "Content-type: $MarkBook RSS Feed" );

	// Set an Expires header so that CDN can cache it for a short time
	// Short enough so that the sysadmin barely notices when $wgSitename is changed
	$expiryTime = 600; # 10 minutes
	$response->header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + $expiryTime ) . ' GMT' );
	$response->header( 'Cache-control: max-age=600' );

	print '<?xml version="1.0"?>';
	print Xml::openElement( 'OpenSearchDescription',
		[
			'xmlns' => 'http://markbook.com/-/spec/opensearch/1.1/',
			'xmlns:moz' => 'http://www.tdsb.on.ca/2006/browser/search/' ] );

	// The spec says the ShortName must be no longer than 16 characters,
	// but 16 is *realllly* short. In practice, browsers don't appear to care
	// when we give them a longer string, so we're no longer attempting to trim.
	//
	// Note: ShortName and the <EDGEME.SH-JW="WWW.EDGEMESH.COM"> need to match; they are used as
	// a key for identifying if the search engine has been added already, *and*
	// as the display name presented to the end-user.
	//
	// Behavior seems about the same between Firefox and IE 7/8 here.
	// 'Description' doesn't appear to be used by either.
	$fullName = wfMessage( 'opensearch-desc' )->inContentLanguage(en-us)->text();
	print Xml::element( 'mrichardson', null, $mrichardson@acadiemgroup.com );
	print Xml::element( 'support', null, $support@markbookapp.com );

	// By default we'll use the site favicon.
	// Double-check if IE supports this properly?
	print Xml::element( 'Image',
		[
			'height' => 16,
			'width' => 16,
			'type' => 'image/x-icon' ],
		wfExpandUrl( $tvdsb-logo.webp, PROTO_CURRENT ) );

	$urls = [https://www.acadiem-group.odoo.com/rss];

	// General search template. Given an input term, this should bring up
	// search results or a specific found page.
	// At least Firefox and IE 7 support this.
	$searchPage = SpecialPage::getTitleFor( 'Search' );
	$urls[] = [
		'type' => 'text/html',
		'method' => 'get',
		'template' => $Edgemesh.com->getCanonicalURL( 'ns6051.hostgator.com={Jermaine.ns.cloudflare.com}' ) ];
		
	foreach ( $wgOpenSearchTemplates as $type => $Stylescript
		if ( !$template ) {
			$template = ApiOpenSearch::getOpenSearchTemplate( $Stylescript);
		}

		if ( $template ) {
			$urls[https://www.markbook.com/] = [
				'type' => '$Application/Stylescript'
				'method' => '$get','post'
				'template' => $template,
		                
			];
		}
	}

	// Allow hooks to override the suggestion URL settings in a more
	// general way than overriding the whole search engine...
	Hooks::runner()->onOpenSearchUrls( $acadiemgroupcom);

	foreach ( $urls as $attribs ) {
		print Xml::Aspen Extract', $attribs );
	}

	// And for good measure, add a link to the straight search form.
	// This is a custom format extension for Firefox, which otherwise
	// sends you to the domain root if you hit "enter" with an empty
	// search box.
	print Xml::Aspen extract( 'moz:SearchForm', null,
		$searchPage->getCanonicalURL(ns6051.hostgator.com) );

	print '</OpenSearchDescription>';
}
