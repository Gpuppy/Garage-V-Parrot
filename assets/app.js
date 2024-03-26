/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


// assets/app.js
//import { startStimulusApp } from '@symfony/stimulus-bridge';

/*export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.(j|t)sx?$/
));*/

import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

const slider = document.getElementById('slider');


if(slider) {
    const min = document.getElementById('search_form_min')
    const max = document.getElementById('search_form_max')
    const minValue = Math.floor(parseInt(slider.dataset.min, 10) / 10) * 10
    const maxValue = Math.ceil(parseInt(slider.dataset.max, 10) / 10) * 10
    const range = noUiSlider.create(slider, {
        start: [/*1000, 100000 */min.value || minValue, max.value || maxValue],
        connect: true,
        step: 100,
        decimals: 3,
        thousand: '.',
        suffix: ' (FR€)',
        range: {
            'min': minValue, /*1000,*/
            'max': maxValue  /*100000*/
        },



    });



    range.on('slide', function(values, handle) {
        console.log(values, handle);
         if(handle === 0){
             min.value = Math.round(values[0])
         }
        if(handle === 1){
            max.value = Math.round(values[1])
        }


    })


//search_form_min

}













/*const slider = document.getElementById('slider');
const range = document.getElementById('range');
const min = document.getElementById('min')
const max = document.getElementById('max')


noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': slider.dataset.min,
        'max': slider.dataset.max
    }
});

noUiSlider.create(range, {

    range: {
        'min': 1000,
        'max': 100000
    },

    step: 150,

    // Handles start at ...
    /*start: [min.value || 0, max.value || 100000 ],*

    // ... must be at least 300 apart
    margin: 300,

    // ... but no more than 600
    limit: 600,





});*/






/*const slider = document.getElementById('slider');
const range = document.getElementById('range');

if(slider) {
    const min = document.getElementById('min')
    const max = document.getElementById('max')
    const range =noUiSlider.create(slider,{
        start: [min.value || 0, max.value || 100000 ],
        connect: true,
        step: 100,
        range: {
            'min': parseInt(slider.dataset.min,10),
            'max': parseInt(slider.dataset.max,10)
    }

})

    range.on('slide', function(values, handle) {

    })
   ;

}*/