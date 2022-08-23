import './editor.css';
import './style.css';
//import {withSelect} from '@wordpress/data';

const {ServerSideRender} = wp.editor;
const {registerBlockType} = wp.blocks;
const {RichText, InspectorControls, BlockControls, AlignmentToolbar} = wp.blockEditor;
const {TextControl, TextareaControl, ToggleControl, PanelBody, PanelRow, CheckboxControl, SelectControl, ColorPicker, Toolbar, Button} = wp.components;

//custom functions

registerBlockType( 'techer/tc-social-share-block',
    {
        // built-in attributes
        title: 'Techer Social Share',
        description: 'Block for showing row of social sharing links',
        icon: 'list-view',
        category: 'layout',
        keywords: ['list', 'row', 'post'],
        supports: {
            align: ['wide', 'full']
        },

        //custom-attributes
        attributes: {
            title: { type: 'string', default: '' },

            label: { type: 'string', default: '' },
        },

        //built-in functions
        edit: ({attributes, setAttributes}) => {

           //layout
            return (
                <div>
                    <h3>Techer Social Share</h3>
                    <TextControl  label='Title' value={attributes.title} type='text' onChange={(newTitle) => setAttributes({title: newTitle})} />
                    <TextControl  label='Label' value={attributes.label} type='text' onChange={(newLabel) => setAttributes({label: newLabel})} />
                </div>
            );
        },

        save: ({attributes}) => {
            //const alignmentClass = (attributes.textAlignment != null) ? 'has-text-align' + attributes.textAlignment : ''
            return null

        }
    }
);