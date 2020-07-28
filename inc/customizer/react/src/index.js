import { BaseControl } from './base/control';
import { headingControl } from './heading/control';
import { hiddenControl } from './hidden/control';
import { descriptionControl } from './description/control';
import { responsiveSliderControl } from './responsive-slider/control';
import { sliderControl } from './slider/control';
import { radioImageControl } from './radio-image/control';
import { responsiveSpacingControl }  from './responsive-spacing/control';

wp.customize.controlConstructor['ast-heading'] = headingControl;
wp.customize.controlConstructor['ast-hidden'] = hiddenControl;
wp.customize.controlConstructor['ast-description'] = descriptionControl;
wp.customize.controlConstructor['ast-responsive-slider'] = responsiveSliderControl;
wp.customize.controlConstructor['ast-slider'] = sliderControl;
wp.customize.controlConstructor['ast-radio-image'] = radioImageControl;
wp.customize.controlConstructor['ast-responsive-spacing'] = responsiveSpacingControl;

window.addEventListener( 'load', () => {
    console.log('Testing Console.');
} );