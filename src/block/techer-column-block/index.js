import './editor.css';
import './style.css';
//import {withSelect} from '@wordpress/data';

const {ServerSideRender} = wp.editor;
const {registerBlockType} = wp.blocks;
const {RichText, InspectorControls, BlockControls, AlignmentToolbar} = wp.blockEditor;
const {TextControl, TextareaControl, ToggleControl, PanelBody, PanelRow, CheckboxControl, SelectControl, ColorPicker, Toolbar, Button} = wp.components;

//custom functions

registerBlockType( 'techer/tc-column-block',
    {
        // built-in attributes
        title: 'Techer Column Block',
        description: 'Block for showing vertical column of articles',
        icon: 'list-view',
        category: 'layout',
        keywords: ['column', 'vertical', 'post'],
        supports: {
            align: ['wide', 'full']
        },

        //custom-attributes
        attributes: {
            title: { type: 'string', default: '' },

            terms: { type: 'array', default: [] },

            numberOfPosts:{ type: 'number', default: 0 },

            offset: { type: 'number', default: 0 },

            backgroundColor: {type: 'string', default: '#FFFFFF'}
        },

        //built-in functions
        edit: ({attributes, setAttributes}) => {

           //layout
            return (
                <div>
                    <InspectorControls>
                        <PanelBody title='TC Column Block Settings' initialOpen={true}>
                            <PanelRow>
                                <ColorPicker
                                    color={attributes.backgroundColor}
                                    onChangeComplete={(newVal) => setAttributes({backgroundColor: newVal.hex})}
                                />
                            </PanelRow>
                        </PanelBody>
                    </InspectorControls>
                    <h3>Techer Column Block</h3>
                    <TextControl  label='Title' value={attributes.title} type='text' onChange={(newTitle) => setAttributes({title: newTitle})} />
                    <TextControl  label='Terms' value={attributes.terms} type='text' onChange={(newTerms) => setAttributes({terms: newTerms})} />
                    <TextControl  label='Number of Posts' value={attributes.numberOfPosts} type='number' onChange={(newNumberOfPosts) => setAttributes({numberOfPosts: parseInt(newNumberOfPosts)})} />
                    <TextControl  label='Offset' value={attributes.offset} type='number' onChange={(newOffset) => setAttributes({offset: parseInt(newOffset)})} />
                </div>
            );
        },

        save: ({attributes}) => {
            //const alignmentClass = (attributes.textAlignment != null) ? 'has-text-align' + attributes.textAlignment : ''
            return null

        }
    }
);