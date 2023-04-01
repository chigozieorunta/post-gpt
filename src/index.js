import { Panel, PanelBody, PanelRow } from '@wordpress/components';

const MyPanel = () => (
	<Panel header="My Panel">
		<PanelBody title="My Block Settings" initialOpen={false}>
			<PanelRow>My Panel Inputs and Labels</PanelRow>
		</PanelBody>
	</Panel>
);

<MyPanel/>
