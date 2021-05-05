( function( api ) {

	// Extends our custom "trustnews" section.
	api.sectionConstructor['trustnews'] = api.Section.extend( {

		// No trustnews for this type of section.
		attachEuphoric: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
