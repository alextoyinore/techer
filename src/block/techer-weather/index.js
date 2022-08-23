import './editor.css';
import './style.css';
//import {withSelect} from '@wordpress/data';

const {ServerSideRender} = wp.editor;
const {registerBlockType} = wp.blocks;
const {RichText, InspectorControls, BlockControls, AlignmentToolbar} = wp.blockEditor;
const {TextControl, TextareaControl, ToggleControl, PanelBody, PanelRow, CheckboxControl, SelectControl, ColorPicker, Toolbar, Button} = wp.components;

//custom functions

registerBlockType( 'techer/tc-weather',
    {
        // built-in attributes
        title: 'Techer Weather',
        description: 'Block for showing the temperature of the day',
        icon: 'list-view',
        category: 'layout',
        keywords: ['list', 'row', 'post'],
        supports: {
            align: ['wide', 'full']
        },

        //custom-attributes
        attributes: {
            title: { type: 'string', default: '' },

            city: { type: 'string' },

            country:{ type: 'string'},

            backgroundColor: {type: 'string', default: '#FFFFFF'}
        },

        //built-in functions
        edit: ({attributes, setAttributes}) => {

           //layout
            return (
                <div>
                    <InspectorControls>
                        <PanelBody title='TC List Block Settings' initialOpen={true}>
                            <PanelRow>
                                <ColorPicker disableAlpha={true}
                                    color={attributes.backgroundColor}
                                    onChangeComplete={(newVal) => setAttributes({backgroundColor: newVal.hex})}
                                />
                            </PanelRow>
                        </PanelBody>
                    </InspectorControls>
                    <h3>Techer Weather</h3>
                    <TextControl  label='Title' value={attributes.title} type='text' onChange={(newTitle) => setAttributes({title: newTitle})} />
                    <TextControl  label='City' value={attributes.city} type='text' placeholder='e.g: Lagos' onChange={(newCity) => setAttributes({city: newCity})} />
                    <TextControl  label='Country' value={attributes.country} type='text' placeholder='e.g: NG' maxlength='2' onChange={(newCountry) => setAttributes({country: newCountry})} />
                </div>
            );
        },

        save: ({attributes}) => {
            //const alignmentClass = (attributes.textAlignment != null) ? 'has-text-align' + attributes.textAlignment : ''
            return null

        }
    }
);