/*global $, SyntaxHighlighter*/

var oTable;


$(document).ready(function () {
	'use strict';

	oTable = $('#example').dataTable({
		"bStateSave": true

	}).yadcf([
]);
	SyntaxHighlighter.all();
});