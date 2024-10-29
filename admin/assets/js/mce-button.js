(function() {
	tinymce.PluginManager.add('sp_advp_mce_button', function( editor, url ) {
		editor.addButton('sp_advp_mce_button', {
			text: false,
            icon: false,
            image: url + '/icon.png',
            tooltip: 'Advanced Portfolio',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Insert Shortcode',
					width: 400,
					height: 100,
					body: [
						{
							type: 'listbox',
							name: 'listboxName',
                            label: 'Select Shortcode',
							'values': editor.settings.spAdvPShortcodeList
						}
					],
					onsubmit: function( e ) {
						editor.insertContent( '[advanced_portfolio id="' + e.data.listboxName + '"]');
					}
				});
			}
		});
	});
})();